<div class="programas form">
<?php echo $this->Form->create('Programa', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Programa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id', array('label' => 'Eventos')); // 'empty' =>'Selecione'
		echo $this->Form->input('tipoprograma_id', array('label' => 'Tipo', 'empty' =>'Selecione'));
		echo $this->Form->input('horario_id', array('label' => 'Horario', 'empty' =>'Selecione'));
		echo $this->Form->input('nome');
		echo $this->Form->input('local');
		echo $this->Form->input('preco', array('type' => 'hidden'));
		echo $this->Form->input('vagas');
		echo $this->Form->input('reservas', array('type' => 'hidden'));
		echo $this->Form->input('filefoto', array('type' => 'hidden'));
		echo $this->Form->input('duracao');
	

		echo $this->Form->input('inicio', array(
			'type'=>'datetime-local',
			'value' => date('Y-m-d\TH:i', strtotime($this->request->data['Horario']['inicio']))
		));
		echo $this->Form->input('termino', array(
			'type'=>'datetime-local',
			'value' => date('Y-m-d\TH:i', strtotime($this->request->data['Horario']['termino']))
		));
		echo $this->Form->input('Programa.descricao', 
			array(
				'label' => 'Descrição', 
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('Programa.conteudo', 
			array(
				'label' => 'Conteúdo', 
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('Programa.certificamos', 
			array(
				'label' => 'Certificamos', 
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('Programa.certificamos_palestrante', 
			array(
				'type' => 'hidden',
				'label' => 'Certificamos Palestrante', 
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('holding_count', array('type' => 'hidden'));
		echo $this->Form->input('Programa.file', array('type' => 'file', 'label' => 'Foto(596x270):'));
		echo $this->Form->input('Programa.file_dir', array('type' => 'hidden'));
		if(!empty($this->request->data['Programa']['file_dir'])){
			echo $this->Html->image(
			'/files/programa/file/'.$this->request->data['Programa']['file_dir'].'/'.$this->request->data['Programa']['file'],
			array(
				'width' => "596px",
				'height'=>'270px', 
				'alt' => $this->request->data['Programa']['file']
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
		echo $this->Form->input('status', array('checked'));
		//echo $this->Form->input('Palestrante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Programa.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Programa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
	</ul>
</div>
