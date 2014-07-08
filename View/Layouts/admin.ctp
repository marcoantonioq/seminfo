<?php $cakeDescription = 'NUCLEO'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title
>	
	<?php
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'pt-br');
	date_default_timezone_set('America/Sao_Paulo');

	//echo "Data: ".date('d/m/Y H:i:s');
	
	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'admin',
		//'/css/twitter/bootstrap.min'
	));
	echo $this->Html->script(
		array(
			'ckeditor/ckeditor.js'
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php //echo $this -> element('layout/logo', array('cache' => '+1 day')); ?>
      		<?php echo $this -> element('layout/session-user'); ?>
			<div class="clearfix"></div>
			<div class='breadcrumbs'>
				<?php echo $this->element('admin_menu', array(), array('cache' => array('key'=>'admin_menu', 'config'=>'hours')));?>
				<div class='clearfix'></div>
			</div>
		</div>

		<div id="content">
			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
			
		</div>
		<?php echo $this->element('sql_dump'); ?>

	</div>
</body>
</html>
