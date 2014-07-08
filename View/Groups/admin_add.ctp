<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Novo grupo'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nome:'));
		echo $this->Form->input('descricao', array('label'=>'Descrição:','class' =>'ckeditor'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo usuários'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
