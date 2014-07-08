<!-- <div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Add Message'); ?></legend>
	<?php
		echo $this->Form->input('typemessage_id', array('label' => 'Tipo mensagem', 'empty' => 'Selecione'));
		echo $this->Form->input('title', array('label' => 'Título'));
		echo $this->Form->input('body', array('class' => 'ckeditor'));
		echo $this->Form->input('notify');
		echo $this->Form->input('status');
		echo $this->Form->input('User', array('label' => 'Usuários'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Tipo mensagem'), array('controller' => 'typemessages', 'action' => 'index')); ?> </li>
	</ul>
</div>
 -->