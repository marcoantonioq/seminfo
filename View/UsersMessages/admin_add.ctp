<div class="usersMessages form">
<?php echo $this->Form->create('UsersMessage'); ?>
	<fieldset>
		<legend><?php echo __('Encaminhar'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('label' => 'Usuário'));
		echo $this->Form->input('message_id', array('label' => 'Mensagem'));
		echo $this->Form->input('read', array('label' => 'Lida'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
	</ul>
</div>
