<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
    <fieldset>
        <legend><?php echo __('Enviar nova Messagens'); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Título'));
		echo $this->Form->input('body', array('class' => 'ckeditor'));
	?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
    </ul>
</div>