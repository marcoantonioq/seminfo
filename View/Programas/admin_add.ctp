<div class="programas form">
<?php echo $this->Form->create('Programa'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Programa'); ?></legend>
	<?php
		echo $this->Form->input('event_id', array('label' => 'Eventos')); // 'empty' =>'Selecione'
		echo $this->Form->input('tipoprograma_id', array('label' => 'Tipo', 'empty' =>'Selecione'));
		echo $this->Form->input('horario_id', array('label' => 'Horario', 'empty' =>'Selecione'));
		echo $this->Form->input('nome');
		echo $this->Form->input('local');
		echo $this->Form->input('preco', array('type' => 'hidden'));
		echo $this->Form->input('vagas');
		echo $this->Form->input('reservas', array('type' => 'hidden'));
		echo $this->Form->input('filefoto', array('type' => 'hidden'));
		echo $this->Form->input('duracao', array('type' => 'hidden'));
		echo $this->Form->input('file', array('type' => 'hidden'));
		echo $this->Form->input('inicio', array('type'=>'datetime-local')); //datetime-local
		echo $this->Form->input('termino', array('type'=>'datetime-local'));

		echo $this->Form->input('Programa.descricao', 
			array(
				'label' => 'Descrição', 
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('Programa.conteudo', 
			array(
				'type' => 'hidden',
				'label' => 'Conteúdo',
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input('Programa.certificamos', 
			array(
				'type' => 'hidden',
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
		echo $this->Form->input('status', array('checked'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Eventos'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Horarios'), array('controller' => 'horarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Tipo programa'), array('tipoprogramas' => 'tipo', 'action' => 'add')); ?> </li>
	</ul>
</div>
