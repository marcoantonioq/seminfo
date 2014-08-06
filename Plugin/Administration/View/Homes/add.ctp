<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Home'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('count', array(
				'label'=>ucfirst(__('count')),
			));

			echo $this->Form->input('session', array(
				'label'=>ucfirst(__('session')),
			));

			echo $this->Form->input('session_count', array(
				'label'=>ucfirst(__('session_count')),
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
			echo $this->Html->link('Novo '.__('home'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
