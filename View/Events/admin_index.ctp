<div class="events index">
	<h2><?php echo __('Eventos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('local', 'Local' ); ?></th>
			<th><?php echo $this->Paginator->sort('publicado', 'Publicado'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
			<th><?php echo $this->Paginator->sort('inicio', 'Início'); ?></th>
			<th><?php echo $this->Paginator->sort('termino', 'Término'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($events as $event): ?>
		<tr>
			<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
			<td><?= $this->Html->link($event['Event']['nome'], array('controller'=>'events', 'action'=>'view', $event['Event']['id'])); ?>&nbsp;</td>
			<td><?php echo h($event['Event']['local']); ?>&nbsp;</td>
			<td><?php echo h($event['Event']['publicado']); ?>&nbsp;</td>
			<td><?php echo h($event['Event']['status']); ?>&nbsp;</td>
			<td><?php echo h($event['Event']['inicio']); ?>&nbsp;</td>
			<td><?php echo h($event['Event']['termino']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $event['Event']['id'])); ?>
				<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $event['Event']['id']), null, __('Tem certeza de que deseja excluir # %s?', $event['Event']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->element('pagination');?>
</div>

<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo Evento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
