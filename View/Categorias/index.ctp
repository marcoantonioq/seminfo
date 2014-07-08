<div class="categorias index">
	<h2><?php echo __('Categorias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($categorias as $categoria): ?>
		<tr>
			<td><?php echo h($categoria['Categoria']['id']); ?>&nbsp;</td>
			<td><?php echo h($categoria['Categoria']['title']); ?>&nbsp;</td>
			<td><?php echo h($categoria['Categoria']['alias']); ?>&nbsp;</td>
			<td><?php echo h($categoria['Categoria']['description']); ?>&nbsp;</td>
			<td><?php echo h($categoria['Categoria']['updated']); ?>&nbsp;</td>
			<td><?php echo h($categoria['Categoria']['created']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoria['Categoria']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $categoria['Categoria']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $categoria['Categoria']['id']), null, __('Tem certeza de que deseja excluir # %s?', $categoria['Categoria']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->element('pagination');?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
