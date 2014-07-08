<div class="contents form">
<?php echo $this->Form->create('Content', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Conteúdos'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
		
		if(!empty($this->request->data['Content']['file_dir'])){
			echo $this->Html->image(
			'/files/content/file/'.$this->request->data['Content']['file_dir'].'/'.$this->request->data['Content']['file'],
			array(
				'width' => "596px",
				'height'=>'270px', 
				'alt' => $this->request->data['Content']['file']
			)
			);
		}else{
			echo $this->Html->image(
			'/img/template/596x270.gif', 
			array(
				'width' => "596px",
				'height'=>'270px',  
				'alt' => 'Post'
			)
			);
		}

	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $this->Form->value('Content.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Content.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Novo conteúdo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
