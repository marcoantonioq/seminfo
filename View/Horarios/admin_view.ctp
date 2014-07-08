<div class="horarios view">
<h2><?php  echo __('Horario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Termino'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['termino']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar Horario'), array('action' => 'delete', $horario['Horario']['id']), null, __('Tem certeza de que deseja excluir # %s?', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo 'Programas'; ?></h3>
	<?php if (!empty($horario['Programa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Evento'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Local'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Participação'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($horario['Programa'] as $programa): ?>
		<tr>
			<td><?php echo $programa['event_id']; ?></td>
			<td><?php echo $programa['nome']; ?></td>
			<td><?php echo $programa['local']; ?></td>
			<td><?php echo $programa['created']; ?></td>
			<td><?php echo $programa['updated']; ?></td>
			<td><?php echo $programa['holding_count']; ?></td>
			<td><?php echo $programa['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programas', 'action' => 'view', $programa['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'programas', 'action' => 'edit', $programa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'programas', 'action' => 'delete', $programa['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo 'Participações em programas'; ?></h3>
	<?php if (!empty($horario['UsersPrograma'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Usuário'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		foreach ($horario['UsersPrograma'] as $holding): ?>
		<tr>
			<td><?php echo $this->Html->link($holding['user_id'], array('controller' => 'users', 'action' => 'view', $holding['user_id'])); ?></td>
			<td><?php echo $holding['created']; ?></td>
			<td><?php echo $holding['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'holdings', 'action' => 'view', $holding['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'holdings', 'action' => 'edit', $holding['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'holdings', 'action' => 'delete', $holding['id']), null, __('Tem certeza de que deseja excluir # %s?', $holding['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
