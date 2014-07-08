<div class="horarios form">
<?php echo $this->Form->create('Horario'); ?>
	<fieldset>
		<legend><?php echo __('Editar Horario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('alias', array(
			'label' => 'Alias',
			'autofocus' => true
		));
		echo $this->Form->input('inicio', array(
			'label'=>'Horário início', 
			'type' => 'datetime-local',
			'value' => date('Y-m-d\TH:i', strtotime($this->request->data['Horario']['inicio']))
		));
		echo $this->Form->input('termino', array(
			'label'=>'Horário início',
			'type' => 'datetime-local',
			'value' => date('Y-m-d\TH:i', strtotime($this->request->data['Horario']['termino']))
		));
		echo $this->Form->input('status');
		echo $this->Form->input('duracao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink('Apagar', array('action' => 'delete', $this->Form->value('Horario.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Horario.id'))); ?></li>
	</ul>
</div>
