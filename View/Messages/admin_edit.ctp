<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Editar mensagem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('typemessage_id', array('label' => 'Tipo mensagem', 'empty' => 'Selecione'));
		echo $this->Form->input('title', array('label' => 'Titulo'));
		echo $this->Form->input('body', array('class' => 'ckeditor'));
		echo $this->Form->input('notify');
		echo $this->Form->input('status');
		echo $this->Form->input('User', array('label' => 'Usuários', 'size' => '15'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link('Voltar', array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Message.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Message.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Tipo de mensagem'), array('controller' => 'typemessages', 'action' => 'index')); ?> </li>
	</ul>
</div>
