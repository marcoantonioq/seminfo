<div class="messages index">
	<h2><?php echo __('Mensagens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated', 'Atualizada em'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($messages as $message): ?>
	<tr>
		<td><?php echo h($message['Message']['id']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['title']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['status']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['updated']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $message['Message']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $message['Message']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $message['Message']['id']), null, __('Tem certeza de que deseja excluir # %s?', $message['Message']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php echo $this->element('pagination'); ?>

</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova mensagem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Enviar Email'), array('action' => 'send')); ?></li>
		<li><?php echo $this->Html->link(__('Tipos de mensagem'), array('controller' => 'typemessages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo de mensagem'), array('controller' => 'typemessages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Mensagem enviadas'), array('controller' => 'users_messages', 'action' => 'index')); ?> </li>
	</ul>
</div>
