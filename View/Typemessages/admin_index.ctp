<div class="typemessages index">
	<h2><?php echo __('Tipos de mensagens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($typemessages as $typemessage): ?>
	<tr>
		<td><?php echo h($typemessage['Typemessage']['id']); ?>&nbsp;</td>
		<td><?php echo h($typemessage['Typemessage']['name']); ?>&nbsp;</td>
		<td><?php echo h($typemessage['Typemessage']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $typemessage['Typemessage']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $typemessage['Typemessage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $typemessage['Typemessage']['id']), null, __('Tem certeza de que deseja excluir # %s?', $typemessage['Typemessage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('controller' => 'messages', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar mensagem'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova mensagem'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
