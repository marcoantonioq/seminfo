<div class="cursos form">
<?php echo $this->Form->create('Curso', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Curso'); ?></legend>
	<?php
		echo $this->Form->input('nome');		
		echo $this->Form->input('descricao');
		
		echo $this->Form->textarea("Curso.body", array('label' => 'Body:', 'class' => 'ckeditor'));
		
		echo $this->Form->input('Curso.file', array('type' => 'file', 'label' => 'Foto(596x270):'));
		echo $this->Form->input('Curso.file_dir', array('type' => 'hidden'));

		echo $this->Form->input('user_count', array('type' => 'hidden'));
		echo $this->Form->input('documento_count', array('type' => 'hidden'));
	?>
	</fieldset>	
<?php echo $this->Form->end(__('Enviar')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar documentos'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
	</ul>
</div>
