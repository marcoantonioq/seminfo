<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Speaker'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('institution', array(
				'label'=>ucfirst(__('institution')),
			));

			echo $this->Form->input('phone', array(
				'label'=>ucfirst(__('phone')),
			));

			echo $this->Form->input('email', array(
				'label'=>ucfirst(__('email')),
			));

			echo $this->Form->input('description', array(
				'label'=>ucfirst(__('description')),
			));

			echo $this->Form->input('twitter', array(
				'label'=>ucfirst(__('twitter')),
			));

			echo $this->Form->input('facebook', array(
				'label'=>ucfirst(__('facebook')),
			));

			echo $this->Form->input('blog', array(
				'label'=>ucfirst(__('blog')),
			));

			echo $this->Form->input('linkedin', array(
				'label'=>ucfirst(__('linkedin')),
			));

			echo $this->Form->input('lattes', array(
				'label'=>ucfirst(__('lattes')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
			));

			echo $this->Form->input('Program', array(
				'label'=>ucfirst(__('Program')),
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
			echo $this->Html->link('Novo '.__('speaker'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
