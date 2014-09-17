<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo __($title_for_layout); ?>
	</title>	
	<?php
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'pt-br');
	
	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'/bootstrap/css/bootstrap.min.css',
		'/bootstrap/css/bootstrap-responsive.min.css',
		'Administration.admin',
		"Administration.icons",
		"Administration.multi-select",
	));

	echo $this->Html->script(
		array(
			'jquery.js',
			'jquery.mask.min.js',
			'/bootstrap/js/bootstrap.min.js',
			'Administration.admin.js',
			'Administration.ajax.js',
			'Administration.ckeditor/ckeditor.js',
			'Administration.jquery.multi-select.js',
			'Administration.jquery-barcode-2.0.2.min.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	
</head>
<body>
	<div id="header">
		<?php echo $this->element(
			'admin/admin_menu', 
			array(), 
			array(
				'cache' => array(
					'key'=>'admin_menu', 
					'config'=>'hours'
				)
			)
		);?>
	</div>
	
	<div id="container">
		 
		<div id="content">
			<div class="row-fluid no-print">
				<?php echo $this->element('layout/session-user'); ?>
				<legend>
					<?php echo __($title_for_layout); ?>
				</legend>
				<?php 
					// pr($this->request->params);
					if(!empty($this->request->params['plugin'])){
			        	$this->Html->addCrumb(
			        		"Administração", 
			        		array(
			        			'plugin' => $this->request->params['plugin'], 
			        			'controller'=>'homes', 
			        			'action'=>'index'
		        			)
	        			); 
				    }

				    if(!empty($this->request->params['controller'])){
			        	$this->Html->addCrumb(
			        		__(ucfirst($this->request->params['controller'])), 
			        		array(
			        			'controller'=>$this->request->params['controller'], 
			        			'action'=>'index'
		        			)
	        			); 
				    }

				    if(!empty($this->request->params['action'])){
			        	$this->Html->addCrumb(
			        		ucfirst(__($this->request->params['action'])), 
			        		array(
			        			'action'=>$this->request->params['action'], 
			        			'action'=>'index'
		        			)
	        			); 
				    }

				    foreach ($this->request->params['pass'] as $key => $value) {
				        $this->Html->addCrumb( $value); 
				    }
				 ?>
				 <?php echo $this->element('admin/breadcrumb') ?>
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Session->flash('auth'); ?>
			</div>

			<div class="print">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>


	</div>
	
	<div id="footer">			
		<?php echo $this->element('sql_dump'); ?>
	</div>
	
	<div id="print">&nbsp; </div>	
</body>
</html>
