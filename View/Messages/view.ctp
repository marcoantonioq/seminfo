<div class="messages view">
<h2><?php  echo __('Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($message['Message']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($message['Message']['body']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Meu  Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Minhas Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Mensagens'), array('action' => 'add')); ?> </li>           
		<li><?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), null, __('Tem certeza de que deseja excluir # %s?', $message['Message']['id'])); ?> </li>
		
	</ul>
</div>
