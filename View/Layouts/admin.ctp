<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo __($title_for_layout); ?>
	</title
>	
	<?php
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'pt-br');
	date_default_timezone_set('America/Sao_Paulo');

	//echo "Data: ".date('d/m/Y H:i:s');
	
	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'bootstrap/css/bootstrap.min.css',
		'bootstrap/css/bootstrap-responsive.min.css',
		'back-end/icon',
		'back-end/admin',
	));
	echo $this->Html->script(
		array(
			'jquery.js',
			'ckeditor/ckeditor.js',
			'/css/bootstrap/js/bootstrap.min.js',
			'back-end/admin.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->fetch('script');
	?>

	<script>
		function bloquearCtrlJ(){   // Verificação das Teclas  
		    var tecla=window.event.keyCode;   //Para controle da tecla pressionada  
		    var ctrl=window.event.ctrlKey;    //Para controle da Tecla CTRL  

		    if (ctrl && tecla==74){    //Evita teclar ctrl + j  
		        event.keyCode=0;  
		        event.returnValue=false;  
		    }  
		}  
	</script>
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
		<div class='clearfix'></div>			
	</div>
	<div id="container">
		 
		<div id="content">

			<div class="row-fluid">
				<legend>
					<?php echo __($title_for_layout); ?>
				</legend>
				<?php 
					if(!empty($this->request->params['prefix'])){
			        	$this->Html->addCrumb(
			        		"Admin", 
			        		array(
			        			$this->request->params['prefix']=>true, 
			        			'controller'=>'pages', 
			        			'action'=>'home'
		        			)
	        			); 
				    }

				    if(!empty($this->request->params['controller'])){
			        	$this->Html->addCrumb(
			        		ucfirst(__($this->request->params['controller'])), 
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
		<?php echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>
