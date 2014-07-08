<div class="holdingsProgramas form">
<?php echo $this->Form->create('HoldingsPrograma'); ?>
	<fieldset>
		<legend><?php echo __('Add Holdings Programa'); ?></legend>
	<?php
		echo $this->Form->input('holding_id');
		echo $this->Form->input('programa_id');
		echo $this->Form->input('certificado');
		echo $this->Form->input('reservas');
		echo $this->Form->input('presenca');
		echo $this->Form->input('Horario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Holdings Programas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Holdings'), array('controller' => 'holdings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holding'), array('controller' => 'holdings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
