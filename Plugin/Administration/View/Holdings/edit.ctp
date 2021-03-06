<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Holding'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
				'class'=>'hide'
			));

			echo "<h4>{$this->request->data['User']['name']}</h4>";

			echo $this->Form->input('program_id', array(
				'label'=>ucfirst(__('program_id')),
				'class'=>'hide'
			));

			echo "<h4>{$this->request->data['Program']['name']}</h4>";

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			// echo $this->Form->input('certificado', array(
			// 	'label'=>ucfirst(__('certificado')),
			// 	'type'=>'select',
			// 	'options'=>array(
			// 		'0'=>'Bloquear',
			// 		'1'=>'Liberar',
			// 	)
			// ));

			echo $this->Form->input('credenciado', array(
				'label'=>ucfirst(__('credenciado')),
			));

			echo $this->Form->input('reservas', array(
				'label'=>ucfirst(__('reservas')),
			));

			echo $this->Form->input('presenca', array(
				'label'=>ucfirst(__('presenca')),
				'readonly'=>'true',
				'class'=>'hidden',
				'style'=>'display:none'
			));

			echo $this->Html->link($this->request->data['Holding']['presenca'],
				array(
					'controller'=>'holdings', 
					'action'=>'presence',
					$this->request->data['Holding']['id'],
					'sum'
				),
				array(
					'class'=>"sendAjax presence green btn bold",
					'value'=>$this->request->data['Holding']['id'],
					'data' => $this->request->data['Holding']['date_presenca']
				)
			); 
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
