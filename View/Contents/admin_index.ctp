<div class="contents index">
	<h2><?php echo __('Conteúdos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<!-- 
				<th></th> 
			-->
			<th><?php echo $this->Paginator->sort('user_id', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id', 'Tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id', 'Categoria'); ?></th>
			<th><?php echo $this->Paginator->sort('title', 'Titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
			<th><?php echo $this->Paginator->sort('promote', 'Promovido'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($contents as $content): ?>
		<tr>
			<!-- <td><?php echo $this->Form->checkbox('Node.' . $node['Node']['id'] . '.id'); ?></td> -->
			<td>
				<?php echo $this->Html->link($content['User']['name'], array('controller' => 'users', 'action' => 'view', $content['User']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($content['Type']['alias'], array('controller' => 'types', 'action' => 'view', $content['Type']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($content['Categoria']['alias'], array('controller' => 'categorias', 'action' => 'view', $content['Categoria']['id'])); ?>
			</td>
			<td><?php echo h($content['Content']['title']); ?>&nbsp;</td>
			<td><?php echo h($content['Content']['status']); ?>&nbsp;</td>
			<td><?php echo h($content['Content']['promote']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $content['Content']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $content['Content']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $content['Content']['id']), null, __('Tem certeza de que deseja excluir # %s?', $content['Content']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination');?>

</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar tipos'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
	</ul>
</div>
