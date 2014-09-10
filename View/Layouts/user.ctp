<?php $cakeDescription = 'NUCLEO'; ?>

<!DOCTYPE html>
<html>
	<head>
		<?php echo $this -> Html -> charset('UTF-8'); ?>
		<title><?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?></title>
		<?php 
		echo $this -> Html -> meta('icon');

		echo $this->Html->css(array(
			"/css/reset.css",
			"/css/estilo.css",
			"/css/users.css",
		));

		echo $this->Html->script(
		array(
			'jquery.js',
			'users.js',
		)
	);

		echo $this -> fetch('meta');
		echo $this -> fetch('css');
		echo $this -> fetch('script');
	?>
	
	<style>

		.fixed {
			position: fixed; 
			top: 0; 
			/*height: 70px; */
			z-index: 9999;
		}

				
		#footer{
			position: relative;
			color: #fff;
			background-color: #fff;
			border-top: 1px solid #000;
		}
	</style>

	</head>
	<body>
		<div id="container">
			<div id="header">
				<div class="wrapper">
					<?php echo $this->element('layout/logo', array(), array('cache' => array('key' => 'logo', 'config' => 'day'))); ?>
					<?php echo $this->element('layout/session-user'); ?>
				</div>
			</div>
			<?php echo $this -> element('users_menu', array( ), array('cache' => array('key' => 'Elementes_users_menu','config' => 'day'))); ?>

			<div class='clearfix'></div>
			
			<div class="wrapper">
				<div id="content">
					<?php // echo $this->Html->nestedList($menu); ?>
					<?php echo $this -> Session -> flash(); ?>
					<?php echo $this -> Session -> flash('auth'); ?>
	
					<?php echo $this -> fetch('content'); ?>
					<div class='clearfix'></div>
					<?php echo $this->fetch('sidebar') ?>
				</div>
			</div>
			<div class='clearfix'></div>
			<div id="footer" class="wrapper">
					<?php echo $this -> element('footer', array(), array('cache' => array('key' => 'Elements_footer', 'config' => 'day'))); ?>
			</div>	
			<div class='clearfix'></div>
			<?php echo $this->element('sql_dump'); ?>
			<div class='clearfix'></div>
			<div id="bottom">
				<div class="wrapper">
					<?php echo $this -> element('bootom',array(), array('cache' => array('key' => 'Elements_bootom', 'config' => 'day'))); ?>
				</div>
			</div>
		</div>
	</body>
</html>
