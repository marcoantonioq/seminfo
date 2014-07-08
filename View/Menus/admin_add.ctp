<div class="menus form">
<?php echo $this->Form->create('Menu'); ?>
	<fieldset>
		<legend><?php echo __('Add Menu'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('alias');
		echo $this->Form->input('class');
		echo $this->Form->input('description');
		echo $this->Form->input('status');
		echo $this->Form->input('weight');
		echo $this->Form->input('link_count');
		echo $this->Form->input('params');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Menus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>
