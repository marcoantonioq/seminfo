<?php 
Router::connect('/', array('controller' => 'homes', 'action' => 'index'));
Router::parseExtensions('rss', 'json', 'xml', 'pdf');