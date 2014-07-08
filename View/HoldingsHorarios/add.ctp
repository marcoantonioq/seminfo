<div class="holdingsHorarios form">
<?php echo $this->Form->create('HoldingsHorario'); ?>
	<fieldset>
		<legend><?php echo __('Add Holdings Horario'); ?></legend>
	<?php
		echo $this->Form->input('holdings_programa_id');
		echo $this->Form->input('horario_id');
		echo $this->Form->input('presenca');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Holdings Horarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holdings Programas'), array('controller' => 'holdings_programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horarios'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
