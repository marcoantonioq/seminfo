<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('User'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('group_id', array(
				'label'=>ucfirst(__('group_id')),
			));

			echo $this->Form->input('course_id', array(
				'label'=>ucfirst(__('course_id')),
			));

			echo $this->Form->input('matricula', array(
				'label'=>ucfirst(__('matricula')),
			));

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('sexo', array(
				'label'=>ucfirst(__('sexo')),
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

			echo $this->Form->input('phone', array(
				'label'=>ucfirst(__('phone')),
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

			echo $this->Form->input('holding_count', array(
				'label'=>ucfirst(__('holding_count')),
			));

			echo $this->Form->input('Message', array(
				'label'=>ucfirst(__('Message')),
			));			
		?>
		<div class="form-actions form-horizontal">
			<?php			  echo $this->Form->button('Enviar', array(
				'class'=>'btn btn-info'
			))." ";
			echo $this->Form->button('Limpar', array(
				'type'=>'reset',
				'class'=>'btn btn-warning'
			));
			
			echo $this->Form->end();

			?>		</div>

	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php  echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
		
			<?php  echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block btn-success')
			); ?>			
			<?php  echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
				</div>
	</div>

</div>
