<div class="messagesUsers index">
	<h2><?php echo __('Messages Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('message_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('read'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($messagesUsers as $messagesUser): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($messagesUser['Message']['title'], array('controller' => 'messages', 'action' => 'view', $messagesUser['Message']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($messagesUser['User']['name'], array('controller' => 'users', 'action' => 'view', $messagesUser['User']['id'])); ?>
		</td>
		<td><?php echo h($messagesUser['MessagesUser']['read']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $messagesUser['MessagesUser']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $messagesUser['MessagesUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $messagesUser['MessagesUser']['id']), null, __('Tem certeza de que deseja excluir # %s?', $messagesUser['MessagesUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas {:page} de {:pages}, mostrando {:current} registros fora de {:count} total, começando no registro {:start}, indo em {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Messages User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
