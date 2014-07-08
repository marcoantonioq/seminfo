<div class="holdings index">
	<h2><?php echo __('Participação'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuários'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id', 'Evento'); ?></th>
			<th><?php echo $this->Paginator->sort('comissa', 'Comissão'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($holdings as $holding): ?>
		<tr>
			
			<td><?php echo h($holding['Holding']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($holding['User']['name'], array('controller' => 'users', 'action' => 'view', $holding['User']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($holding['Event']['nome'], array('controller' => 'events', 'action' => 'view', $holding['Event']['id'])); ?>
			</td>
			<td><?php echo h($holding['Holding']['comissao']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $holding['Holding']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $holding['Holding']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $holding['Holding']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holding['Holding']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->element('pagination');?>	
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova Participação'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo evento'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
