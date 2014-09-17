<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
    <fieldset>
        <legend><?php echo __('Add Message'); ?></legend>
	<?php
		echo $this->Form->input('to');
		echo $this->Form->input('subject');
		echo $this->Form->textarea('message');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Messages'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
    </ul>
</div>
