<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo __($title_for_layout); ?>
	</title>	
	<?php
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'pt-br');
	date_default_timezone_set('America/Sao_Paulo');

	//echo "Data: ".date('d/m/Y H:i:s');
	
	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'/bootstrap/css/bootstrap.min.css',
		'/bootstrap/css/bootstrap-responsive.min.css',
		'Administration.icon',
		'Administration.admin',
		"Administration.icons",
	));
	echo $this->Html->script(
		array(
			'jquery.js',
			'/bootstrap/js/bootstrap.min.js',
			'Administration.ckeditor/ckeditor.js',
			'Administration.admin.js',
			'Administration.jquery-barcode-en13.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
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
			<?php echo $this->element('layout/session-user'); ?>
			<div class="row-fluid">
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
			</div>

			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>


	</div>
	
	<div id="footer">			
		<div class="marco">
			Desenvolvido por Marco Antônio Queiroz | TADS turma de 2011 | <a target="_blank" href="https://www.facebook.com/marcoaq7">facebook</a> | <a href="br.linkedin.com/pub/marco-antônio-queiroz/2b/539/4b8/" target="_blank">linkedin</a> | email: marco.aq7@gmail.com
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</div>
	
</body>
</html>
