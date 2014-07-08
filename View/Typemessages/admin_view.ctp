<div class="typemessages view">
<h2><?php  echo __('Tipo de mensagem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($typemessage['Typemessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($typemessage['Typemessage']['name']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $typemessage['Typemessage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Apagar', array('action' => 'delete', $typemessage['Typemessage']['id']), null, __('Tem certeza de que deseja excluir # %s?', $typemessage['Typemessage']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Novo tipo', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Listar mensagem', array('controller' => 'messages', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Mensagens relacionadas'); ?></h3>
	<?php if (!empty($typemessage['Message'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Notify'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($typemessage['Message'] as $message): ?>
		<tr>
			<td><?php echo $message['id']; ?></td>
			<td><?php echo $message['typemessage_id']; ?></td>
			<td><?php echo $message['title']; ?></td>
			<td><?php echo $message['notify']; ?></td>
			<td><?php echo $message['status']; ?></td>
			<td><?php echo $message['updated']; ?></td>
			<td><?php echo $message['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'messages', 'action' => 'view', $message['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'messages', 'action' => 'edit', $message['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'messages', 'action' => 'delete', $message['id']), null, __('Tem certeza de que deseja excluir # %s?', $message['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
