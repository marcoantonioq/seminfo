<div class="usersprogramas form">
<?php echo $this->Form->create('Usersprograma'); ?>
	<fieldset>
		<legend><?php echo __('Nova participação'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('empty' => 'Selecione'));
		echo $this->Form->input('programa_id', array('empty' => 'Selecione'));
		echo $this->Form->input('status');
		echo $this->Form->input('certificado');
		echo $this->Form->input('credenciado');
		echo $this->Form->input('reservas');
		echo $this->Form->input('presenca');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Usersprogramas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
