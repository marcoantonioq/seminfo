<div class="links form">
<?php echo $this->Form->create('Link'); ?>
	<fieldset>
		<legend><?php echo __('Edit Link'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('menu_id');
		echo $this->Form->input('title');
		echo $this->Form->input('class');
		echo $this->Form->input('description');
		echo $this->Form->input('link');
		echo $this->Form->input('target');
		echo $this->Form->input('rel');
		echo $this->Form->input('status');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('visibility_roles');
		echo $this->Form->input('params');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Link.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Link.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
