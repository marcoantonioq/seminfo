<div class="contents form">
<?php echo $this->Form->create('Content', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Novo Conteúdo'); ?></legend>
	<?php
		echo $this->Form->input('type_id', 
			array(
				'label' => 'Tipo de conteúdo',
				'empty'=>'Selecione...'
			)
		);
		echo $this->Form->input('categoria_id', 
			array(
				'label' => 'Categoria de conteúdo',
				'empty'=>'Selecione...'
			)
		);
		echo $this->Form->input(
			'user_id'
		);
		echo $this->Form->input('title', 
			array(
				'label' => 'Título',
				'placeholder'=>'Digite o titulo para o conteúdo...'
			)
		);
		echo $this->Form->textarea('Content.body', 
			array(
				'label' => 'Descrição',
				'placeholder'=>'Digite o titulo para o conteúdo...',
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('file', 
			array(
				'type' => 'file', 
				'label' => 'Foto(596x270):'
			)
		);
		echo $this->Form->hidden('file_dir');
		echo $this->Form->input('status', 
			array(
				'label' => 'Status:'
			)
		);
		echo $this->Form->input('promote', 
			array(
				'label' => 'Promovelo:'
			)
		);
		echo $this->Form->hidden('path', 
			array(
				//'type' => 'file', 
				'label' => 'Arquivo(anexo):'
			)
		);
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Conteúdos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar tipos'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
