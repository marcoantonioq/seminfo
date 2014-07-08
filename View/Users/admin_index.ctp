<div class="users index">
	<h2><?php echo __('Users'); ?></h2>

	<?php 
		echo $this->Form->create('Validade');
		echo $this->Form->input('conditions', array(
			'label' => false,
			'type' => 'select',
			'options' => array(
				'3' => 'Código',
				'2' => 'Nome',
				'1' => 'CPF',
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

	<?php echo $this->Form->create('User', array(
        'url' => array(
            'admin' => true,
            'action' => 'print',
            //'ext'=>'pdf'
        )
    )); ?>
    
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('usersprograma_count','Participações'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $this->Form->checkbox('User.'.$user['User']['id']. '.check', array('checked' => false)); ?></td>
		<td><?= $user['User']['id']; ?></td>
		<td>
			<?php 
			echo $this->Html->link(
				$user['Group']['name'], 
				array(
					'controller' => 'groups', 
					'action' => 'view', 
					$user['Group']['id']
				)
			);
			?>
		</td>
		<td><?php 
			echo $this->Html->link(
			$user['User']['name'], 
				array(
					'controller' => 'users', 
					'action' => 'view',
					$user['User']['id']
				)
			); 
			?>&nbsp;
		</td>
		<td><?php echo h($user['User']['status']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['usersprograma_count']); ?>&nbsp;</td>
		<td><?= date('d/m/Y H:i:s', strtotime($user['User']['created'])); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Form->end('Imprimir'); ?>
	
	<?php echo $this->element('pagination'); ?>
</div>

<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Sexo'), array('controller' => 'sexos', 'action' => 'add')); ?> </li>
	</ul>
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