<div class="row-fluid">

	<div class='span8'>		
		<?php 
			echo $this->Form->create('User'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
			
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

		<div class="form-actions">
			<?php echo $this->Form->end(__('Enviar'), array('class'=>"btn")); ?>
		</div>	

	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>

			<?php echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>
			

            <?php 
			
			echo $this->Html->link('Novo',
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
		</div>
	</div>

</div>
