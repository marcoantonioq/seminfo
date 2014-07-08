<div class="messagesUsers form">
<?php echo $this->Form->create('MessagesUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Messages User'); ?></legend>
	<?php
		echo $this->Form->input('message_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('read');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MessagesUser.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('MessagesUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Messages Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
