<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Message'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('title', array(
				'label'=>ucfirst(__('title')),
			));

			echo $this->Form->input('body', array(
				'label'=>ucfirst(__('body')),
			));

			echo $this->Form->input('notify', array(
				'label'=>ucfirst(__('notify')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('User', array(
				'label'=>ucfirst(__('User')),
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
			echo $this->Html->link('Novo '.__('message'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
					
			<?php  echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
			<?php  echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>
				</div>
	</div>

</div>
