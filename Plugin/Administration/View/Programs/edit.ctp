<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Program', array('type'=>'file')); 
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
				'dateFormat' => 'DMY',
			    'minYear' => date('Y'),
			    'maxYear' => date('Y') + 1,
			));

			echo $this->Form->input('date_end', array(
				'label'=>ucfirst(__('date_end')),
				'dateFormat' => 'DMY',
			    'minYear' => date('Y'),
			    'maxYear' => date('Y') + 1,
			));

			echo $this->Form->input('time_begin', array(
				'label'=>ucfirst(__('time_begin')),
			    'selected' => '07:00:00',

			));

			echo $this->Form->input('time_end', array(
				'label'=>ucfirst(__('time_end')),
			    'selected' => '07:00:00',
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

			echo $this->Form->input('holding_count', array(
				'label'=>ucfirst(__('holding_count')),
			));

			echo $this->Form->input('Speaker', array(
				'label'=>ucfirst(__('Speaker')),
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
