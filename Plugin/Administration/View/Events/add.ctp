<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Event'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('local', array(
				'label'=>ucfirst(__('local')),
			));

			echo $this->Form->input('published', array(
				'label'=>ucfirst(__('published')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('first', array(
				'label'=>ucfirst(__('first')),
			));

			echo $this->Form->input('last', array(
				'label'=>ucfirst(__('last')),
			));

			echo $this->Form->input('realization', array(
				'label'=>ucfirst(__('realization')),
			));

			echo $this->Form->input('description', array(
				'label'=>ucfirst(__('description')),
			));

			echo $this->Form->input('organization', array(
				'label'=>ucfirst(__('organization')),
			));

			echo $this->Form->input('president', array(
				'label'=>ucfirst(__('president')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
			));

			echo $this->Form->input('Sponsorship', array(
				'label'=>ucfirst(__('Sponsorship')),
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
			echo $this->Html->link('Novo '.__('event'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
