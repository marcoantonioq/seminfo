<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Sponsorship'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('website', array(
				'label'=>ucfirst(__('website')),
			));

			echo $this->Form->input('description', array(
				'label'=>ucfirst(__('description')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
			));

			echo $this->Form->input('Event', array(
				'label'=>ucfirst(__('Event')),
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
			echo $this->Html->link('Novo '.__('sponsorship'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
