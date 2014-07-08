<div class="palestrantes form">
<?php echo $this->Form->create('Palestrante', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Novo palestrante'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('instituicao',array(
				'label' => 'Instituição', 
		));
		echo $this->Form->input('telefone');
		echo $this->Form->input('email');		
		echo $this->Form->textarea('descricao', array('label' => 'Descrição: ', 'class'=>'ckeditor'));
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook');
		echo $this->Form->input('blog');
		echo $this->Form->input('linkedin');
		echo $this->Form->input('lattes');
		echo $this->Form->input('Programa');
		echo $this->Form->input('Palestrante.file', array('type' => 'file', 'label' => 'Foto(282x267):'));
		echo $this->Form->input('Palestrante.file_dir', array('type' => 'hidden'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
