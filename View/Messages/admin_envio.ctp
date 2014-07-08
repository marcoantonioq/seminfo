<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Nova mesangem'); ?></legend>
	<?php
		echo $this->Form->input('to', array('label' => 'E-mail'));
		echo $this->Form->input('subject', array('label' => 'Título'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
	</ul>
</div>