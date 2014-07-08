<div class="holdingsProgramas view">
<h2><?php  echo __('Participação: Programa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['id']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Programa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($holdingsPrograma['Programa']['id'], array('controller' => 'programas', 'action' => 'view', $holdingsPrograma['Programa']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Certificado'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['certificado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservas'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['reservas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presenca'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['presenca']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($holdingsPrograma['HoldingsPrograma']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $holdingsPrograma['HoldingsPrograma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $holdingsPrograma['HoldingsPrograma']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holdingsPrograma['HoldingsPrograma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Horarios'); ?></h3>
	<?php if (!empty($holdingsPrograma['Horario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Inicio'); ?></th>
		<th><?php echo __('Termino'); ?></th>
		<th><?php echo __('Programa Id'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		foreach ($holdingsPrograma['Horario'] as $horario): ?>
		<tr>
			<td><?php echo $horario['id']; ?></td>
			<td><?php echo $horario['inicio']; ?></td>
			<td><?php echo $horario['termino']; ?></td>
			<td><?php echo $horario['programa_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'horarios', 'action' => 'view', $horario['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'horarios', 'action' => 'edit', $horario['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'horarios', 'action' => 'delete', $horario['id']), null, __('Tem certeza de que deseja excluir # %s?', $horario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Horario'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
