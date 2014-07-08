<div class="palestrantes form">
<?php echo $this->Form->create('Palestrante', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar palestrante'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
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

		if(!empty($this->request->data['Palestrante']['file_dir'])){
			echo $this->Html->image(
			'/files/palestrante/file/'.$this->request->data['Palestrante']['file_dir'].'/'.$this->request->data['Palestrante']['file'],
			array(
				'height'=>'150px', 
				'alt' => $this->request->data['Palestrante']['file']
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
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Palestrante.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Palestrante.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
