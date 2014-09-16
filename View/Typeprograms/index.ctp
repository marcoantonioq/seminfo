<div class="tipoprogramas index">
	<h2><?php echo __('Tipoprogramas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($tipoprograms as $tipoprogram): ?>
	<tr>
		<td><?php echo h($tipoprogram['Tipoprogram']['id']); ?>&nbsp;</td>
		<td><?php echo h($tipoprogram['Tipoprogram']['title']); ?>&nbsp;</td>
		<td><?php echo h($tipoprogram['Tipoprogram']['alias']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tipoprogram['Tipoprogram']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>	
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tipoprograma'), array('action' => 'add')); ?></li>
	</ul>
</div>
