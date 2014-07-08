<div class="usersMessages index">
	<h2><?php echo __('Mensagem encaminhadas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('message_id', 'Mensagem'); ?></th>
			<th><?php echo $this->Paginator->sort('read', 'Lida'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($usersMessages as $usersMessage): ?>
	<tr>
		<td><?php echo h($usersMessage['UsersMessage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersMessage['User']['name'], array('controller' => 'users', 'action' => 'view', $usersMessage['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersMessage['Message']['title'], array('controller' => 'messages', 'action' => 'view', $usersMessage['Message']['id'])); ?>
		</td>
		<td><?php echo h($usersMessage['UsersMessage']['read']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $usersMessage['UsersMessage']['id']), null, __('Tem certeza de que deseja excluir # %s?', $usersMessage['UsersMessage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('controller'=>'messages','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Encaminhar'), array('action' => 'add')); ?></li>
	</ul>
</div>
