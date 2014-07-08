<div class="horarios index">
	<h2><?php echo __('Horários'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('termino'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($horarios as $horario): ?>

	<tr>
		<td><?= $horario['Horario']['id']; ?>&nbsp;</td>
		<td><?=$horario['Horario']['alias']; ?>&nbsp;</td>
		<td><?php echo date('H:i:s d/m/Y', strtotime($horario['Horario']['inicio'])); ?>&nbsp;</td>
		<td><?php echo date('H:i:s d/m/Y', strtotime($horario['Horario']['termino'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $horario['Horario']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $horario['Horario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $horario['Horario']['id']), null, __('Tem certeza de que deseja excluir # %s?', $horario['Horario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
