<div class="usersMessages view">
<h2><?php  echo __('Users Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersMessage['UsersMessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersMessage['User']['name'], array('controller' => 'users', 'action' => 'view', $usersMessage['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersMessage['Message']['title'], array('controller' => 'messages', 'action' => 'view', $usersMessage['Message']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Read'); ?></dt>
		<dd>
			<?php echo h($usersMessage['UsersMessage']['read']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Users Message'), array('action' => 'edit', $usersMessage['UsersMessage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Message'), array('action' => 'delete', $usersMessage['UsersMessage']['id']), null, __('Tem certeza de que deseja excluir # %s?', $usersMessage['UsersMessage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Message'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
