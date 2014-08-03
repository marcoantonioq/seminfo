<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('User'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('group_id', array(
				'label'=>ucfirst(__('group_id')),
			));

			echo $this->Form->input('curso_id', array(
				'label'=>ucfirst(__('curso_id')),
			));

			echo $this->Form->input('matricula', array(
				'label'=>ucfirst(__('matricula')),
			));

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('sexo_id', array(
				'label'=>ucfirst(__('sexo_id')),
			));

			echo $this->Form->input('username', array(
				'label'=>ucfirst(__('username')),
			));

			echo $this->Form->input('password', array(
				'label'=>ucfirst(__('password')),
			));

			echo $this->Form->input('email', array(
				'label'=>ucfirst(__('email')),
			));

			echo $this->Form->input('cpf', array(
				'label'=>ucfirst(__('cpf')),
			));

			echo $this->Form->input('telefone', array(
				'label'=>ucfirst(__('telefone')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('website', array(
				'label'=>ucfirst(__('website')),
			));

			echo $this->Form->input('image', array(
				'label'=>ucfirst(__('image')),
			));

			echo $this->Form->input('image_dir', array(
				'label'=>ucfirst(__('image_dir')),
			));

			echo $this->Form->input('message_count', array(
				'label'=>ucfirst(__('message_count')),
			));

			echo $this->Form->input('usersprograma_count', array(
				'label'=>ucfirst(__('usersprograma_count')),
			));			
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
            ); ?>		</div>
	</div>

</div>
