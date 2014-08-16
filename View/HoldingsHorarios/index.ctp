<div class="holdingsHorarios index">
	<h2><?php echo __('Holdings Horarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('holdings_programa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('horario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('presenca'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($holdingsHorarios as $holdingsHorario): ?>
	<tr>
		<td><?php echo h($holdingsHorario['HoldingsHorario']['id']); ?>&nbsp;</td>
		<td><?php echo h($holdingsHorario['HoldingsHorario']['holdings_programa_id']); ?>&nbsp;</td>
		<td><?php echo h($holdingsHorario['HoldingsHorario']['horario_id']); ?>&nbsp;</td>
		<td><?php echo h($holdingsHorario['HoldingsHorario']['presenca']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $holdingsHorario['HoldingsHorario']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $holdingsHorario['HoldingsHorario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $holdingsHorario['HoldingsHorario']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holdingsHorario['HoldingsHorario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas {:page} de {:pages}, mostrando {:current} registros fora de {:count} total, começando no registro {:start}, indo em {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Holdings Horario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horarios'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
