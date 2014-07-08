<div class="types form">
<?php echo $this->Form->create('Type'); ?>
	<fieldset>
		<legend><?php echo __('Novo tipo conteúdo'); ?></legend>
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
		echo $this->Form->input('description',
			array(
				'label' => 'Descrição',
				'class'=>'ckeditor',
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar tipos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar conteúdo'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo conteúdo'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
