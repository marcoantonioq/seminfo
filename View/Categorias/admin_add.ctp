<div class="categorias form">
	<ul class="navegacao">
	    <li><?php echo $this->Html->link('Categoria', array('action'=>'index'));?><span class="divider">/</span></li>
	    <li class="active">Nova</li>
	</ul>

<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('title',
			array(
				'label' => 'Título',
				'placeholder'=>'Digite o titulo para o conteúdo...'
			)
		);
		echo $this->Form->input('alias',
			array(
				'label' => 'Alias',
				'placeholder'=>'Digite o alias para o conteúdo...'
			)
		);
		echo $this->Form->textarea("description", 
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

		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Conteuds'), array('controller' => 'conteuds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Conteúdo'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
