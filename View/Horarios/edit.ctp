<div class="horarios form">
<?php echo $this->Form->create('Horario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Horario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('inicio');
		echo $this->Form->input('termino');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Horario.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Horario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users Programas'), array('controller' => 'usersprogramas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Programa'), array('controller' => 'usersprogramas', 'action' => 'add')); ?> </li>
	</ul>
</div>
