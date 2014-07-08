<div class="programasPalestrantes index">
	<h2><?php echo __('Programas Palestrantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('certificado'); ?></th>
			<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('palestrante_id'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($programasPalestrantes as $programasPalestrante): ?>
	<tr>
		<td><?php echo h($programasPalestrante['ProgramasPalestrante']['id']); ?>&nbsp;</td>
		<td><?php echo h($programasPalestrante['ProgramasPalestrante']['certificado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($programasPalestrante['Programa']['id'], array('controller' => 'programas', 'action' => 'view', $programasPalestrante['Programa']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($programasPalestrante['Palestrante']['nome'], array('controller' => 'palestrantes', 'action' => 'view', $programasPalestrante['Palestrante']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $programasPalestrante['ProgramasPalestrante']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $programasPalestrante['ProgramasPalestrante']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $programasPalestrante['ProgramasPalestrante']['id']), null, __('Tem certeza de que deseja excluir # %s?', $programasPalestrante['ProgramasPalestrante']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>	
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Programas Palestrante'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Palestrante'), array('controller' => 'palestrantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
