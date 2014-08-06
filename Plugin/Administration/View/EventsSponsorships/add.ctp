<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('EventsSponsorship'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('event_id', array(
				'label'=>ucfirst(__('event_id')),
			));

			echo $this->Form->input('sponsorship_id', array(
				'label'=>ucfirst(__('sponsorship_id')),
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
			echo $this->Html->link('Novo '.__('eventsSponsorship'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
