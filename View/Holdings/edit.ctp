<div class="holdings form">
<?php echo $this->Form->create('Holding'); ?>
	<fieldset>
		<legend><?php echo __('Edit Holding'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('comissa');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Holding.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Holding.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Holdings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
