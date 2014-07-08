<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Nova Mensagem'); ?></legend>
	<?php
		echo $this->Form->input('to', array('label' => 'Para'));
		echo $this->Form->input('subject', array('label' => 'Título'));
		echo $this->Form->textarea('message', 
			array(
				'label' => 'Mensagem', 
				'class' => 'ckeditor'
			)
		);
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
