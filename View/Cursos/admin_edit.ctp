<div class="cursos form">
<?php echo $this->Form->create('Curso', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar curso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome', array('label' => 'Nome do curso:'));
		echo $this->Form->input('descricao', array('label' => 'Descrição do curso:'));
		
		echo $this->Form->textarea("Curso.body", array('label' => 'Descrição:', 'class' => 'ckeditor'));
		
		echo $this->Form->input('Curso.file', array('type' => 'file', 'label' => 'Foto(596x270):'));
		echo $this->Form->input('Curso.file_dir', array('type' => 'hidden'));

		echo $this->Form->input('usersprograma_count');
		echo $this->Form->input('documento_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Curso.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Curso.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar documentos'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
	</ul>
</div>
