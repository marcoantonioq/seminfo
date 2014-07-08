<div class="cursos index">
	<h2><?php echo __('Cursos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($cursos as $curso): ?>
		<tr>
			<td><?php echo h($curso['Curso']['id']); ?>&nbsp;</td>
			<td><?php echo h($curso['Curso']['nome']); ?>&nbsp;</td>
			<td>
				<?php echo date('d/m/Y, h:i', strtotime($curso['Curso']['updated'])); ?>
				&nbsp;
			</td>
			<td>
				<?php echo date('d/m/Y, h:i', strtotime($curso['Curso']['created'])); ?>
				&nbsp;
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $curso['Curso']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $curso['Curso']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $curso['Curso']['id']), null, __('Tem certeza de que deseja excluir # %s?', $curso['Curso']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination');?>
</div>

<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo Curso'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Curso'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo documentos'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
	</ul>
</div>
