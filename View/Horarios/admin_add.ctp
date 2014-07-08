<div class="horarios form">
<?php echo $this->Form->create('Horario'); ?>
	<fieldset>
		<legend><?php echo __('Add Horario'); ?></legend>
	<?php
		echo $this->Form->input('alias', array('label' => 'Alias'));
		echo $this->Form->input('inicio', array('label'=>'Horário início', 'type' => 'datetime-local'));
		echo $this->Form->input('termino', array('label'=>'Horário início', 'type' => 'datetime-local'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
	</ul>
</div>
