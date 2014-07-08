<div class="typemessages form">
<?php echo $this->Form->create('Typemessage'); ?>
	<fieldset>
		<legend><?php echo __('Novo tipo de mensagem'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nome:'));
		echo $this->Form->input('description', array('label' => 'Descrição:'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar tipos de mensagens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar mensagem'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo de mensagem'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
