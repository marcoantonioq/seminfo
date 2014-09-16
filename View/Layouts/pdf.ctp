<?php

echo $this->Html->meta('icon');
	echo $this->Html->css(array());
	echo $this->Html->script(
		array(
			'jquery.js',
			'Administration.admin.js',
			'Administration.jquery-barcode-en13.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>


<?php echo $this -> fetch('content'); ?>
