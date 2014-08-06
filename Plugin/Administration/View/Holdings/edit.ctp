<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Holding'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
			));

			echo $this->Form->input('program_id', array(
				'label'=>ucfirst(__('program_id')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('certificado', array(
				'label'=>ucfirst(__('certificado')),
			));

			echo $this->Form->input('credenciado', array(
				'label'=>ucfirst(__('credenciado')),
			));

			echo $this->Form->input('reservas', array(
				'label'=>ucfirst(__('reservas')),
			));

			echo $this->Form->input('presenca', array(
				'label'=>ucfirst(__('presenca')),
			));			
		?>

		<div class="form-actions">			
			<?php echo $this->Form->end(__('Enviar'), array('class'=>"btn")); ?>
		</div>	

	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php  echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
			<?php 			
			echo $this->Html->link('Novo '.__('holding'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
					
			<?php  echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
			<?php  echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>
				</div>
	</div>

</div>
