<div class="links index">
	<h2><?php echo __('Links'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('menu_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('rel'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('visibility_roles'); ?></th>
			<th><?php echo $this->Paginator->sort('params'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($links as $link): ?>
	<tr>
		<td><?php echo h($link['Link']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($link['ParentLink']['title'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($link['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
		</td>
		<td><?php echo h($link['Link']['title']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['class']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['description']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['link']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['target']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['rel']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['status']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['lft']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['rght']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['visibility_roles']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['params']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['updated']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $link['Link']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $link['Link']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $link['Link']['id']), null, __('Tem certeza de que deseja excluir # %s?', $link['Link']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Link'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
