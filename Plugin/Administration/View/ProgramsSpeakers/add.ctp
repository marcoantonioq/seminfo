<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('ProgramsSpeaker'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('certificado', array(
				'label'=>ucfirst(__('certificado')),
			));

			echo $this->Form->input('program_id', array(
				'label'=>ucfirst(__('program_id')),
			));

			echo $this->Form->input('speaker_id', array(
				'label'=>ucfirst(__('speaker_id')),
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
			echo $this->Html->link('Novo '.__('programsSpeaker'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
