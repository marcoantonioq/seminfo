<div class="menus view">
<h2><?php  echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Count'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['link_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar Menu'), array('action' => 'delete', $menu['Menu']['id']), null, __('Tem certeza de que deseja excluir # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Links'); ?></h3>
	<?php if (!empty($menu['Link'])): ?>
		
	<?= pr($menu);  ?>
	
	<ul class="menu">
		<?php
			$i = 0;
			foreach ($menu['Link'] as $link): ?>
				<li><?php echo $this->Html->link($link['title'], $link['link']); ?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>