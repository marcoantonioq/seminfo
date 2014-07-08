<div class="events form">
<?php echo $this->Form->create('Event', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Evento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('local');
		echo $this->Form->input('publicado');
		echo $this->Form->input('status');
		echo $this->Form->input('inicio');
		echo $this->Form->input('termino');
		echo $this->Form->input('realizacao');
		
		echo $this->Form->textarea('Event.descricao', array('label' => 'Descrição: ', 'class' => 'ckeditor'));
		echo $this->Form->input('Event.file', array('type' => 'file', 'label' => 'Foto(596x270):'));
		echo $this->Form->input('Event.file_dir', array('type' => 'hidden'));
		
		if(!empty($this->request->data['Event']['file_dir'])){
			echo $this->Html->image(
			'/files/event/file/'.$this->request->data['Event']['file_dir'].'/'.$this->request->data['Event']['file'],
			array(
				'width' => "596px",
				'height'=>'270px', 
				'alt' => $this->request->data['Event']['file']
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
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Event.id'))); ?></li>
	</ul>
</div>
