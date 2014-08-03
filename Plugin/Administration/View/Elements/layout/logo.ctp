<?php 
	echo $this->Html->link(
		$this->Html->image(
			'/img/template/nucleo_informatica.png', 
			array(
				'border' => '0',
				'height' => '80px'
			)
		),
		array(
			'plugin' => null,
			'controller' => 'homes',
			'action' => 'index'
		), 
		array(
			'escape' => false, 
			'id' => 'logo',
		)
	);
?>