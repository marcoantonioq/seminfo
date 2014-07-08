<style>
	.input > .checkbox {
		padding: 0;
		margin: 3px 0;
		z-index: 999999;
	}
</style>

<div class="">
	<h2><?php echo __('Credenciamento'); ?></h2>
	<?php 
		echo $this->Form->create('Validade');
		echo $this->Form->input('conditions', array(
			'label' => false,
			'type' => 'select',
			'options' => array(
				'4' => 'Código',
				'1' => 'CPF',
				'2' => 'Nome',
				'3' => 'Programa',
			),
			'style'=> 'float:left; display: inline;',
		));
		echo $this->Form->input('search', array(
			'autocomplete'=>'off',
			'onkeydown'=>'bloquearCtrlJ();',
			'autofocus' => true,
			'label' => false,
			'placeholder' => 'Buscar...',
			'style'=> 'float:left; width:300px; display: inline; ',
		));
		echo $this->Form->end();
	 ?>
	

	<?php echo $this->Form->create('Usersprograma', array(
        'url' => array(
            'admin' => true,
            'action' => 'process'
        )
    )); ?>

		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th><?php echo $this->Paginator->sort('credenciado'); ?></th>
				<th><?php echo $this->Paginator->sort('certificado'); ?></th>
				<th><?php echo $this->Paginator->sort('presenca', 'Presença'); ?></th>
				<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($usersprogramas as $usersprograma): ?>
			<tr>
			<?php //pr($usersprograma); ?>
				<td><?php echo $this->Form->checkbox('Usersprograma.'.$usersprograma['Usersprograma']['id']. '.check', array('checked' => true)); ?></td>
				<td>
					<?php echo $this->Html->link($usersprograma['User']['name'], array('controller' => 'users', 'action' => 'view', $usersprograma['User']['id']), array('class'=>($usersprograma['User']['status'])?'':'gray')); ?>
				</td>
				<td>
					<?php echo $this->Html->link($usersprograma['Programa']['nome'].' - '.$usersprograma['Programa']['local'], array('controller' => 'programas', 'action' => 'view', $usersprograma['Programa']['id']), array('class'=>($usersprograma['Programa']['status'])?'':'gray')); ?>
				</td>
				<td>
					<?php echo $this->element('layout/status', 
						array('id' => $usersprograma['Usersprograma']['id'], 'status' => $usersprograma['Usersprograma']['status'])); 
					?>
				</td>
				<td>
					<?php 
						echo $this->element('layout/status', 
							array('id' => $usersprograma['Usersprograma']['id'], 'status' => $usersprograma['Usersprograma']['credenciado']));
					?>
				</td>
				<td>
					<?php 
						echo $this->element('layout/status', 
							array('id' => $usersprograma['Usersprograma']['id'], 'status' => $usersprograma['Usersprograma']['certificado']));
					?>
				</td>
				<td>
					<?= $usersprograma['Usersprograma']['presenca']; ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersprograma['Usersprograma']['id'])); ?>
					<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $usersprograma['Usersprograma']['id'])); ?>
					<?php echo $this->Html->link(__('Credenciar'), array('action' => 'credenciamento', $usersprograma['Usersprograma']['id']), null); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php echo $this->element('pagination'); ?>
		
		<?php 
			echo $this->Form->input('Usersprograma.action', array(
				'label' => 'Selecione operação',
				'type' => 'select',
				'multiple' => 'checkbox',
				'style' => 'padding: 0; margin: 0',
				'options' => array(
					'status' => 'Status',
					'certificado' => 'Certificado',
					'credenciado' => 'Credenciar',
					'descredenciado' => 'DesCredenciar',
					/*'reservas' => 'Reserva',
					'presenca' => 'Presença'*/
				),
			));
		?>
		
	<?php echo $this->Form->end('Enviar'); ?>
	
</div>


<script>
	function bloquearCtrlJ(){   // Verificação das Teclas  
	    var tecla=window.event.keyCode;   //Para controle da tecla pressionada  
	    var ctrl=window.event.ctrlKey;    //Para controle da Tecla CTRL  

	    if (ctrl && tecla==74){    //Evita teclar ctrl + j  
	        event.keyCode=0;  
	        event.returnValue=false;  
	    }  
	}  
</script>