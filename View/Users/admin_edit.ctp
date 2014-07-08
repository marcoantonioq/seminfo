<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		
		<legend><?php echo __('Editar usuário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input(
        	'curso_id', 
        	array(
        		'empty' => 'Selecione',
        		'label' => 'Estuda nesta instiução?',
        		'div'=>'clearfix',
        		//'type' => 'hidden'
    		)
		);
		echo $this->Form->input(
			'matricula', 
			array(
				'label' => 'Qual sua matricula?', 
				'div'=>'clearfix',
        		//'type' => 'hidden'
			)
		);
		echo $this->Form->input(
			'name', 
			array(
				'label' => 'Nome: ',
				'placeholder' => 'Digite seu nome...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'group_id', 
			array(
				'empty' => 'Selecione',
				'label' => 'Grupo',
				'div'=>'clearfix',
				//'type' => 'hidden'
			)
		);
		echo $this->Form->input(
			'sexo_id', 
			array(
				'empty' => 'Selecione',
				'label' => 'Sexo',
				'empty' => 'Selecione',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'username', 
			array(
				'placeholder' => 'Digite seu username...',
				'label' => 'Nome do usuário:',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'status',
			array(
				//'checked' => true,
				//'type' => 'hidden',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'email', 
			array(
				'placeholder' => 'Digite E-mail...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'cpf', 
			array(
				'placeholder' => 'Digite cpf...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'telefone', 
			array(
				'placeholder' => 'Digite telefone...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'website', 
			array(
				//'type' => 'hidden',
				'div'=>'clearfix',
			)
		);
		echo $this->Form->input(
			'image', 
			array(
				'label' ,'Foto',
				'div'=>'clearfix',
				//'type' => 'hidden',
			)
		);
		echo $this->Form->input(
			'image_dir', 
			array(
				//'type' => 'hidden',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'holding_count', 
			array(
				'div'=>'clearfix',
				//'type' => 'hidden',
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Votar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Sexos'), array('controller' => 'sexos', 'action' => 'index')); ?> </li>
	</ul>
</div>
