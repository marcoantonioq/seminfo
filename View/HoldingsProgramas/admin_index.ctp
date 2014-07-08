<div class="holdingsProgramas index">
	<h2><?php echo __('Participações Programas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('holding_id', 'Participações'); ?></th>
			<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('certificado'); ?></th>
			<th><?php echo $this->Paginator->sort('reservas'); ?></th>
			<th><?php echo $this->Paginator->sort('presenca'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($holdingsProgramas as $holdingsPrograma): ?>
	<tr>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($holdingsPrograma['Holding']['alias'], array('controller' => 'holdings', 'action' => 'view', $holdingsPrograma['Holding']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($holdingsPrograma['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $holdingsPrograma['Programa']['id'])); ?>
		</td>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['certificado']); ?>&nbsp;</td>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['reservas']); ?>&nbsp;</td>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['presenca']); ?>&nbsp;</td>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['created']); ?>&nbsp;</td>
		<td><?php echo h($holdingsPrograma['HoldingsPrograma']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $holdingsPrograma['HoldingsPrograma']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $holdingsPrograma['HoldingsPrograma']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $holdingsPrograma['HoldingsPrograma']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holdingsPrograma['HoldingsPrograma']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>	
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova paricipação'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar paricipação'), array('controller' => 'holdings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
	</ul>
</div>
