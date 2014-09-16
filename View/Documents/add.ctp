<div class="documents form">
<?php echo $this->Form->create('Document'); ?>
    <fieldset>
        <legend><?php echo __('Add Document'); ?></legend>
	<?php
		echo $this->Form->input('programs_id');
		echo $this->Form->input('title');
		echo $this->Form->input('file');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Documents'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar programa'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New programa'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
    </ul>
</div>
