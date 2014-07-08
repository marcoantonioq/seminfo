<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');	
		echo $this->Form->input('title',
			array(
				'label' => 'Título',
				'placeholder'=>'Digite o titulo para o conteúdo...'
			)
		);
		echo $this->Form->input('alias',
			array(
				'label' => 'Alias',
				'placeholder'=>'Digite o alias para o conteúdo...',
				'class'=>'ckeditor',
			)
		);
		echo $this->Form->input("Categoria.description", 
			array(
				'label' => 'Descrição:', 
				'class' => 'ckeditor'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Categoria.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Categoria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Conteuds'), array('controller' => 'conteuds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conteud'), array('controller' => 'conteuds', 'action' => 'add')); ?> </li>
	</ul>
</div>
