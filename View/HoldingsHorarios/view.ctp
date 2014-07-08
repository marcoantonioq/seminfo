<div class="holdingsHorarios view">
<h2><?php  echo __('Holdings Horario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holdingsHorario['HoldingsHorario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holdings Programa Id'); ?></dt>
		<dd>
			<?php echo h($holdingsHorario['HoldingsHorario']['holdings_programa_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horario Id'); ?></dt>
		<dd>
			<?php echo h($holdingsHorario['HoldingsHorario']['horario_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presenca'); ?></dt>
		<dd>
			<?php echo h($holdingsHorario['HoldingsHorario']['presenca']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Holdings Horario'), array('action' => 'edit', $holdingsHorario['HoldingsHorario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Holdings Horario'), array('action' => 'delete', $holdingsHorario['HoldingsHorario']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holdingsHorario['HoldingsHorario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Holdings Horarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holdings Horario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horarios'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
