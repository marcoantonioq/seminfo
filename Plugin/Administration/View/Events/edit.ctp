<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Event', array('type'=>'file')); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

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
				'dateFormat' => 'DMY',
			    'minYear' => date('Y'),
			    'maxYear' => date('Y') + 1,
			    'selected' => '07:00:00',
			));

			echo $this->Form->input('last', array(
				'label'=>ucfirst(__('last')),
				'dateFormat' => 'DMY',
			    'minYear' => date('Y'),
			    'maxYear' => date('Y') + 1,
			    'selected' => '07:00:00',
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
		
			<?php  echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block btn-success')
			); ?>			
			<?php  echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
				</div>
	</div>

</div>
