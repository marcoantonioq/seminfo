<div class="categorias view">
<h2><?php  echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), null, __('Tem certeza de que deseja excluir # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Conteuds'), array('controller' => 'conteuds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Conteudo'), array('controller' => 'conteuds', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Conteuds'); ?></h3>
	<?php if (!empty($categoria['Conteud'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Promote'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Conteud'] as $conteud): ?>
		<tr>
			<td><?php echo $conteud['id']; ?></td>
			<td><?php echo $conteud['user_id']; ?></td>
			<td><?php echo $conteud['type_id']; ?></td>
			<td><?php echo $conteud['categoria_id']; ?></td>
			<td><?php echo $conteud['parent_id']; ?></td>
			<td><?php echo $conteud['title']; ?></td>
			<td><?php echo $conteud['body']; ?></td>
			<td><?php echo $conteud['status']; ?></td>
			<td><?php echo $conteud['promote']; ?></td>
			<td><?php echo $conteud['path']; ?></td>
			<td><?php echo $conteud['file']; ?></td>
			<td><?php echo $conteud['lft']; ?></td>
			<td><?php echo $conteud['rght']; ?></td>
			<td><?php echo $conteud['updated']; ?></td>
			<td><?php echo $conteud['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conteuds', 'action' => 'view', $conteud['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'conteuds', 'action' => 'edit', $conteud['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'conteuds', 'action' => 'delete', $conteud['id']), null, __('Tem certeza de que deseja excluir # %s?', $conteud['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conteud'), array('controller' => 'conteuds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
