<div class="tipoprogramas form">
<?php echo $this->Form->create('Tipoprograma'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipoprograma'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Titulo: '));
		echo $this->Form->input('alias', array('label' => 'Alias: '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipoprograma.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Tipoprograma.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipoprogramas'), array('action' => 'index')); ?></li>
	</ul>
</div>
