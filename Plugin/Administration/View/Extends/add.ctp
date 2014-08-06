<?php $this->Html->addCrumb( __($title_for_layout), array('action'=> 'index')); ?>
<?php $this->Html->addCrumb( 'Novo', array('action'=> 'add')); ?>

<div class="row-fluid">
	<div class='span8'>
		<?php echo $this->fetch('contents') ?>
	</div>
	
	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Ações'); ?></h3>
				<?php echo $this->Link->icon('Voltar', 
	                'black-icons bended_arrow_left',
	                array( 'action' => 'index'),
	                array('class'=> 'btn btn-block')
	            ); ?>
				<?php echo $this->Link->icon('Limpar',
	                'black-icons big_brush',
	                array( 'action' => 'index', 'action'=>'add'),
	                array('class'=> 'btn btn-block btn-danger')
	            ); ?>
	            <?php echo $this->Link->icon('Novo', 
	                'icon16 icomoon-icon-checkmark white',
	                array( 'action' => 'add'),
	                array('class'=> 'btn btn-block btn-success')
	            ); ?>
	            <?php echo $this->fetch('menu'); ?>
		</div>
	</div>

	<div class="span4" style='float: left !important;'>
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Relacionados'); ?></h3>
			<?php echo $this->fetch('box'); ?>
		</div>
	</div>
</div>