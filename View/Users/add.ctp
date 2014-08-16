<?php 
	echo $this->Html->css(array(
		'/js/userload/users.css'
	));

	echo $this->Html->script(
		array(
			'jquery.mask.min.js',
			'/js/userload/users.js',
		)
	);
	echo $this->fetch('script');
 ?>

<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('User', array('type'=>'file')); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>

		<?php  
		
			// validar no model
			echo $this->Form->input('group_id', array(
				'label'=>ucfirst(__('group_id')),
				'value'=>3, // publico
				'type'=>'hidden'
			));

			echo $this->Form->input('cpf', array(
				'label'=>ucfirst(__('cpf')),
				'maxLength'=>'14',
				'placeholder' => 'Digite cpf...',
				'pattern' => "^\d{3}.\d{3}.\d{3}-\d{2}$",
				'placeholder'=>"111.111.111-11"
			));

		 ?>

		 <?php echo $this->Html->link(
		 	"Digite o cpf para continuar. Informação obrigatória para geração de certificado", 
		 	array(
		 		'plugin'=>'administration', 
		 		'controller'=>'users',
		 		'action'=>'getseminfo2013'
	 		),
	 		array(
	 			'class'=>'btn',
	 			'id'=>'sendgetseminfo2013'
	 		)
		 ); ?>

		<div id="formcomplite">
			
			<?php 
				echo $this->Form->input('name', array(
					'label' => 'Nome completo: ',
					'placeholder' => 'Digite seu nome. Necessario para impressão certificado',
					'div'=>'clearfix'
				));

				echo $this->Form->input('course_id', array(
					'empty' => 'Selecione',
	        		'label' => 'Estuda nesta instiução?',
	        		'div'=>'clearfix',
	        		'type' => 'hidden'
				));

				echo $this->Form->input('matricula', array(
					'label' => 'Qual sua matricula?', 
					'div'=>'clearfix',
	        		'type' => 'hidden'
				));

				echo $this->Form->input('sexo', array(
					'label'=>ucfirst(__('sexo')),
					'empty'=>'Selecione',
					'type'=>'select',
					'options'=>array(
						'Masculino'=>'Masculino',
						'Feminino'=>'Feminino'
					)
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
		</div>
	</div>

	<div class="form-actions form-horizontal">
		<?php			  
		echo $this->Form->button('Enviar', array(
			'class'=>'btn btn-info'
		))." ";
		echo $this->Form->button('Limpar', array(
			'type'=>'reset',
			'class'=>'btn btn-warning'
		));
		
		echo $this->Form->end();

		?>		

	</div>

</div>
