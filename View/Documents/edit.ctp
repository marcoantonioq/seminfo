<div class="documents form">
<?php echo $this->Form->create('Document'); ?>
    <fieldset>
        <legend><?php echo __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('program_id');
		echo $this->Form->input('title');
		echo $this->Form->input('file');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Document.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Document.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Documents'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New programs'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
    </ul>
</div>
