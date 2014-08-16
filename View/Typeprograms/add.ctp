<div class="tipoprogramas form">
<?php echo $this->Form->create('Tipoprograma'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipoprograma'); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Titulo: '));
		echo $this->Form->input('alias', array('label' => 'Alias: '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar tipo programas'), array('action' => 'index')); ?></li>
	</ul>
</div>
