<div class="types view">
<h2><?php  echo __('Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($type['Type']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($type['Type']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($type['Type']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($type['Type']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($type['Type']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($type['Type']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar tipo'), array('action' => 'edit', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar tipo'), array('action' => 'delete', $type['Type']['id']), null, __('Tem certeza de que deseja excluir # %s?', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar conteúdo'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo conteúdo'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado conteúdo'); ?></h3>
	<?php if (!empty($type['Content'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Promovido'); ?></th>
		<th><?php echo __('Atualizado'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($type['Content'] as $content): ?>
		<tr>
			<td><?php echo $content['title']; ?></td>
			<td><?php echo $content['status']; ?></td>
			<td><?php echo $content['promote']; ?></td>
			<td><?php echo $content['updated']; ?></td>
			<td><?php echo $content['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contents', 'action' => 'view', $content['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'contents', 'action' => 'edit', $content['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'contents', 'action' => 'delete', $content['id']), null, __('Tem certeza de que deseja excluir # %s?', $content['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo conteúdo'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
