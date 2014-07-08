<div class="events form">
<?php echo $this->Form->create('Event', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Novo Evento'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('local');
		echo $this->Form->input('publicado', array('label' => 'Promovido'));
		echo $this->Form->input('status', array('label' => 'Ativo'));
		echo $this->Form->input('inicio', array(
			'type'=>'datetime-local',
		));
		echo $this->Form->input('termino', array(
			'type'=>'datetime-local',
		));
		echo $this->Form->input('realizacao');
		echo $this->Form->textarea('Event.descricao', array('label' => 'Descrição: ', 'class' => 'ckeditor'));
		echo $this->Form->input('Event.file', array('type' => 'file', 'label' => 'Foto(596x270):'));
		echo $this->Form->input('Event.file_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
	</ul>
</div>
