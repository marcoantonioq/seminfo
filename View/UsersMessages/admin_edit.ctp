<div class="usersMessages form">
<?php echo $this->Form->create('UsersMessage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Users Message'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('message_id');
		echo $this->Form->input('read');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UsersMessage.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('UsersMessage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Users Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
