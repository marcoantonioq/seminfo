<?php $this->extend('/Common/Events/index'); ?>

<?php 
	$this->assign('title', $this->Session->read('Auth.User.name'));
 	$this->assign('subtitle', 'Participações em eventos');
 ?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
<?php
 	echo $this->Html->css('timeline/timeline');
	echo $this -> fetch('css');
 ?>

	<div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('programa_id', 'Programa'); ?></th>
		</tr>
		</table>
	</div>

<div class='clearfix'></div>
<?php if (empty($usersprogramas)): ?>
	<h3>Não está á inscrito em nenhum programa</h3>
	<?= $this->Html->link(
		'Veja as Inscrição/Horários e inscreva em alguma programação!',array(
			'controller' => 'horarios',
			'action' => 'index'
	)); ?>
<?php else: ?>
<ul id="timeline">
	<?php foreach ($usersprogramas as $usersprograma): ?>
	<li class="work">
		<input class="radio" id="work<?= $usersprograma['Programa']['id'] ?>" name="works" type="radio" checked="">
		<div class="relative">
		  <label for="work<?= $usersprograma['Programa']['id'] ?>">
		  	<?= $usersprograma['Programa']['Event']['nome'].' / '.
		  	$usersprograma['Programa']['Tipoprograma']['title'].' - '.
		  	$usersprograma['Programa']['nome'].($usersprograma['Usersprograma']['reservas']?' - <strong>Cadastro de reserva</strong>':' ')?>
		  </label>
		  <span class="date">
				<?php
					if(date('d', strtotime($usersprograma['Programa']['Horario']['inicio'])) == date('d', strtotime($usersprograma['Programa']['Horario']['termino']))):
						echo '<strong> '.
						date('d/m H:i', strtotime($usersprograma['Programa']['Horario']['inicio'])).'</strong>';
					else:
						echo '<strong>'.
							date('d/m ', strtotime($usersprograma['Programa']['Horario']['inicio'])).' á '.
							date('d/m', strtotime($usersprograma['Programa']['Horario']['termino'])).'<br> as '.
							date('H:i ', strtotime($usersprograma['Programa']['Horario']['inicio'])).'</strong>';
					endif;
				?>
		  </span>
		  <span class="circle"></span>
		</div>
		<div class="content">
			</br>
		    <?php 
		    	echo $this->Html->link('Detalhes',
		    		array(
			    		'controller' => 'programas', 
			    		'action' => 'view', 
			    		$usersprograma['Programa']['id']
		    		)
	    		);
    		?>
    		<br>
		    <?php if($usersprograma['Usersprograma']['certificado'] == true): ?>
			    <?= $this->Html->link(
					' <span>Certificado</span>', 
					array('controller' => 'usersprogramas', 'action' => 'certificado', $usersprograma['Usersprograma']['id'], 'ext'=>'pdf'),
					array('target' => '_blank', 'escape' => false)

				);
				?>
				<br>
			<?php endif; ?>
			<?php if($usersprograma['Programa']['status'] == true): ?>

			<?php if($usersprograma['Usersprograma']['certificado'] != true): ?>			
				<?php echo $this->Form->postLink(
					' Sair da programação',
					array(
						'action' => 'delete', 
						$usersprograma['Usersprograma']['id']), 
						null, 
						__('Tem certeza de que deseja sair do programa # %s?', $usersprograma['Programa']['nome']
					)
				);

				?>
			<?php endif; ?>
			<br>
			<?php endif; ?>
		</div>		

  </li>
  <?php endforeach; ?>  
</ul>
<?php endif; ?>
	<div class="actions">
		<h3><?php echo __('Mais'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Perfil'), array('controller' => 'users','action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Mensagens'), array('controller' => 'users', 'action' => 'mensagens')); ?> </li>
		</ul>
	</div>
	<div class='clearfix'></div>

	<?php echo $this->element('pagination'); ?>
<?php $this->end() ?>

<!--
	END Bloco
-->
