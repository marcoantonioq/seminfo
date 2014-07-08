<div class="programasPalestrantes form">
<?php echo $this->Form->create('ProgramasPalestrante'); ?>
	<fieldset>
		<legend><?php echo __('Edit Programas Palestrante'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('certificado');
		echo $this->Form->input('programa_id');
		echo $this->Form->input('palestrante_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProgramasPalestrante.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('ProgramasPalestrante.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas Palestrantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Palestrante'), array('controller' => 'palestrantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
