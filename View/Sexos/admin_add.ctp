<div class="sexos form">
<?php echo $this->Form->create('Sexo'); ?>
	<fieldset>
		<legend><?php echo __('Novo sexo'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('sexo_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
