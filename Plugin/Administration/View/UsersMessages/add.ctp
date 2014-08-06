<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('UsersMessage'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
			));

			echo $this->Form->input('message_id', array(
				'label'=>ucfirst(__('message_id')),
			));

			echo $this->Form->input('read', array(
				'label'=>ucfirst(__('read')),
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
			echo $this->Html->link('Novo '.__('usersMessage'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
				</div>
	</div>

</div>
