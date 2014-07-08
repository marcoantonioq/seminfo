<div class="sexos form">
<?php echo $this->Form->create('Sexo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sexo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('user_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sexo.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Sexo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Sexos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
