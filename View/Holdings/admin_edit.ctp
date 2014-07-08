<div class="holdings form">
<?php echo $this->Form->create('Holding'); ?>
	<fieldset>
		<legend><?php echo __('Editar participação'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('label' => 'Usuário'));
		echo $this->Form->input('event_id', array('label' => 'Evento'));
		echo $this->Form->input('comissao', array('label' => 'Comissão'));
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('Programa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Holding.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Holding.id'))); ?></li>
	</ul>
</div>
