<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Program'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('event_id', array(
				'label'=>ucfirst(__('event_id')),
			));

			echo $this->Form->input('typeprogram_id', array(
				'label'=>ucfirst(__('typeprogram_id')),
			));

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('local', array(
				'label'=>ucfirst(__('local')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('price', array(
				'label'=>ucfirst(__('price')),
			));

			echo $this->Form->input('vagas', array(
				'label'=>ucfirst(__('vagas')),
			));

			echo $this->Form->input('reservations', array(
				'label'=>ucfirst(__('reservations')),
			));

			echo $this->Form->input('duration', array(
				'label'=>ucfirst(__('duration')),
			));

			echo $this->Form->input('content', array(
				'label'=>ucfirst(__('content')),
			));

			echo $this->Form->input('date_begin', array(
				'label'=>ucfirst(__('date_begin')),
			));

			echo $this->Form->input('date_end', array(
				'label'=>ucfirst(__('date_end')),
			));

			echo $this->Form->input('time_begin', array(
				'label'=>ucfirst(__('time_begin')),
			));

			echo $this->Form->input('time_end', array(
				'label'=>ucfirst(__('time_end')),
			));

			echo $this->Form->input('min_presence', array(
				'label'=>ucfirst(__('min_presence')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
			));

			echo $this->Form->input('certify', array(
				'label'=>ucfirst(__('certify')),
			));

			echo $this->Form->input('certify_speakers', array(
				'label'=>ucfirst(__('certify_speakers')),
			));

			echo $this->Form->input('description', array(
				'label'=>ucfirst(__('description')),
			));

			echo $this->Form->input('holdding_count', array(
				'label'=>ucfirst(__('holdding_count')),
			));

			echo $this->Form->input('Speaker', array(
				'label'=>ucfirst(__('Speaker')),
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
			echo $this->Html->link('Novo '.__('program'),
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
