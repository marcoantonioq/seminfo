<div class="usersprogramas form">
<?php echo $this->Form->create('Usersprograma'); ?>
	<fieldset>
		<legend><?php echo __('Editar participação'); ?></legend>
		
		<h3><?php echo $this->request->data['User']['name']; ?></h3>
		<h3><span>Programa: </span><?php echo $this->request->data['Programa']['nome']; ?></h3>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status');
		echo $this->Form->input('certificado');
		echo $this->Form->input('credenciado');
		echo $this->Form->input('reservas');
		echo $this->Form->input('presenca');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usersprograma.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Usersprograma.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
	</ul>
</div>
