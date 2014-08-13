<?php 

Router::connect('/administration', array(
	'plugin'=>'administration',
	'controller' => 'homes', 
	'action' => 'index'
));

Router::connect('/', array('controller' => 'homes', 'action' => 'index'));
Router::parseExtensions('rss', 'json', 'xml', 'pdf');
Router::setExtensions(array('pdf'));