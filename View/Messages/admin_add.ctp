<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Nova mensagem'); ?></legend>
	<?php
		echo $this->Form->input('title', 
			array(
				'label' => 'Título',
				'placeholder' => 'Digite o título da mensagem'
			)
		);

		echo $this->Form->input('typemessage_id', array(
				'label' => 'Tipo de mensagem:',
				'empty' => 'Selecione'
			)
		);

		echo $this->Form->input('body', 
			array(
				'label' => 'Conteúdo',
				'class' => 'ckeditor'
			)
		);

		echo $this->Form->input('status');

		echo $this->Form->input('User', 
			array(
				'label' => 'Usuários',
				'size' => '15'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>


<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('Voltar', array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar tipos de mensagens'), array('controller' => 'typemessages', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Novo tipo de mensagem'), array('controller' => 'typemessages', 'action' => 'add')); ?> </li>
	</ul>
</div>