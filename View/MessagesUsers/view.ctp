<div class="messagesUsers view">
<h2><?php  echo __('Messages User'); ?></h2>
	<dl>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo $this->Html->link($messagesUser['Message']['title'], array('controller' => 'messages', 'action' => 'view', $messagesUser['Message']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($messagesUser['User']['name'], array('controller' => 'users', 'action' => 'view', $messagesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Read'); ?></dt>
		<dd>
			<?php echo h($messagesUser['MessagesUser']['read']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Messages User'), array('action' => 'edit', $messagesUser['MessagesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Messages User'), array('action' => 'delete', $messagesUser['MessagesUser']['id']), null, __('Tem certeza de que deseja excluir # %s?', $messagesUser['MessagesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Messages Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Messages User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
