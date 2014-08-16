<div class="palestrantes form">
<?php echo $this->Form->create('Palestrante'); ?>
	<fieldset>
		<legend><?php echo __('Edit Palestrante'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('telefone');
		echo $this->Form->input('email');
		echo $this->Form->input('descricao');
		echo $this->Form->input('filefoto');
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook');
		echo $this->Form->input('blog');
		echo $this->Form->input('linkedin');
		echo $this->Form->input('lattes');
		echo $this->Form->input('Programa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Palestrante.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Palestrante.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
