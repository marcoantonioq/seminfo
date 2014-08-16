<div class="programas form">
<?php echo $this->Form->create('Programa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Programa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('local');
		echo $this->Form->input('preco');
		echo $this->Form->input('vagas');
		echo $this->Form->input('reservas');
		echo $this->Form->input('filefoto');
		echo $this->Form->input('duracao');
		echo $this->Form->input('file');
		echo $this->Form->input('conteudo');
		echo $this->Form->input('certificamos');
		echo $this->Form->input('certificamos_palestrante');
		echo $this->Form->input('descricao');
		echo $this->Form->input('holding_programa_count');
		echo $this->Form->input('status');
		echo $this->Form->input('Holding');
		echo $this->Form->input('Horario');
		echo $this->Form->input('Palestrante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Programa.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Programa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Holdings'), array('controller' => 'holdings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holding'), array('controller' => 'holdings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('controller' => 'horarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Palestrante'), array('controller' => 'palestrantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
