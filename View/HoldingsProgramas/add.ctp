<div class="">
<?php echo $this->Form->create('HoldingsPrograma'); ?>
	<fieldset>
		<legend><?php echo __('Add Participação Programa'); ?></legend>
	<?php
		echo $this->Form->input('holding_id');
		echo $this->Form->input('programa_id');
		echo $this->Form->input('certificado', array('type' => 'hidden'));
		echo $this->Form->input('reservas');
		echo $this->Form->input('presenca', array('type' => 'hidden'));
		echo $this->Form->input('Horario', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
