<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Document', array('type'=>'file')); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('program_id', array(
				'label'=>ucfirst(__('program_id')),
			));

			echo $this->Form->input('title', array(
				'label'=>ucfirst(__('title')),
			));

			echo $this->Form->input('author', array(
				'label'=>ucfirst(__('author')),
			));

			echo $this->Form->input('institution', array(
				'label'=>ucfirst(__('institution')),
			));

			echo $this->Form->input('email', array(
				'label'=>ucfirst(__('email')),
			));

			echo $this->Form->input('course', array(
				'label'=>ucfirst(__('course')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
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
				</div>
	</div>

</div>
