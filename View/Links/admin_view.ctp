<div class="links view">
<h2><?php  echo __('Link'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Link'); ?></dt>
		<dd>
			<?php echo $this->Html->link($link['ParentLink']['title'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($link['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($link['Link']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($link['Link']['class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($link['Link']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo h($link['Link']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rel'); ?></dt>
		<dd>
			<?php echo h($link['Link']['rel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($link['Link']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($link['Link']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($link['Link']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visibility Roles'); ?></dt>
		<dd>
			<?php echo h($link['Link']['visibility_roles']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($link['Link']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($link['Link']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($link['Link']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Link'), array('action' => 'edit', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Link'), array('action' => 'delete', $link['Link']['id']), null, __('Tem certeza de que deseja excluir # %s?', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Links'); ?></h3>
	<?php if (!empty($link['ChildLink'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Menu Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Class'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Target'); ?></th>
		<th><?php echo __('Rel'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Visibility Roles'); ?></th>
		<th><?php echo __('Params'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($link['ChildLink'] as $childLink): ?>
		<tr>
			<td><?php echo $childLink['id']; ?></td>
			<td><?php echo $childLink['parent_id']; ?></td>
			<td><?php echo $childLink['menu_id']; ?></td>
			<td><?php echo $childLink['title']; ?></td>
			<td><?php echo $childLink['class']; ?></td>
			<td><?php echo $childLink['description']; ?></td>
			<td><?php echo $childLink['link']; ?></td>
			<td><?php echo $childLink['target']; ?></td>
			<td><?php echo $childLink['rel']; ?></td>
			<td><?php echo $childLink['status']; ?></td>
			<td><?php echo $childLink['lft']; ?></td>
			<td><?php echo $childLink['rght']; ?></td>
			<td><?php echo $childLink['visibility_roles']; ?></td>
			<td><?php echo $childLink['params']; ?></td>
			<td><?php echo $childLink['updated']; ?></td>
			<td><?php echo $childLink['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'links', 'action' => 'view', $childLink['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'links', 'action' => 'edit', $childLink['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'links', 'action' => 'delete', $childLink['id']), null, __('Tem certeza de que deseja excluir # %s?', $childLink['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
