<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Novo Usuário'); ?></legend>
	<?php
		echo $this->Form->input(
        	'curso_id', 
        	array(
        		'empty' => 'Selecione',
        		'label' => 'Estuda nesta instiução?',
        		'div'=>'clearfix',
        		'type' => 'hidden'
    		)
		);
		echo $this->Form->input(
			'matricula', 
			array(
				'label' => 'Qual sua matricula?', 
				'div'=>'clearfix',
        		'type' => 'hidden'
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
				//'empty' => 'Selecione',
				//'value' => 2,
				'label' => 'Grupo',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'sexo_id', 
			array(
				'label' => 'Sexo',
				'empty' => 'Selecione',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->hidden(
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
				'checked' => true,
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
				'div'=>'clearfix',
				'pattern' => "^\d{11}$",
				'placeholder'=>"11111111111"
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
			'password',
			array(
				'placeholder' =>'Digite senha...',
				'label' => 'Senha: ', 
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'password2',
			array(
				'placeholder' => 'Confirmar senha...',
				'label' => __('Confirme a senha:'), 
				'type' => 'password', 
				'div'=>'clearfix',
			)
		);
		echo $this->Form->input(
			'website', 
			array(
				'type' => 'hidden',
				'div'=>'clearfix',
			)
		);
		echo $this->Form->input(
			'image', 
			array(
				'label' ,'Foto',
				'div'=>'clearfix',
				'type' => 'hidden',
			)
		);
		echo $this->Form->input(
			'image_dir', 
			array(
				'type' => 'hidden',
				'div'=>'clearfix'
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
		<li><?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Sexos'), array('controller' => 'sexos', 'action' => 'index')); ?> </li>
	</ul>
</div>
