<?php $this->Html->addCrumb( __($title_for_layout), array('action'=> 'index')); ?>
<?php $this->Html->addCrumb( 'Visualizar', array('action'=> 'view', $this->params['pass'][0])); ?>

<div class="row-fluid">
	<div class='span8'>
		<?php //pr($title_for_layout); ?>
		<?php echo $this->fetch('contents') ?>
	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			<?php echo $this->Link->icon('Voltar', 
				'bended_arrow_left',
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
			<?php echo $this->Link->icon('Editar', 
				null,
				array('action' => 'edit', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>
			<?php echo $this->Link->iconPost('Apagar',
                'icon16 icomoon-icon-cancel-2 white',
                array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger'),
                __('Tem certeza de que deseja excluir?')
            ); ?>
            
			<?php echo $this->Link->icon('Novo', 
                'icon16 icomoon-icon-checkmark white',
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block btn-success')
            ); ?>
		</div>
	</div>
	
	<div class="span4" style='float: left !important;'>
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Relacionados'); ?></h3>
			<?php echo $this->fetch('box'); ?>
		</div>
	</div>
	
</div>

<div class="row-fluid">
	<div class="page-header">
	    <h2>+</h2>
	    <!-- <h4>Mais</h4> -->
	</div>
    <?php echo $this->fetch('related') ?>    
</div>