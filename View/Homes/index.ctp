<?php echo $this->element('/Events/index', array(), array('cache' => array('key' => 'Elemente/Events/index', 'config' => 'hours'))); ?>


<div class='tabs'>
  &nbsp;
</div>

<?php echo $this->element('/Contents/top_post', 
	array(), 
	array(
		'cache' => array(
			'key' => 'Contents/topo_post', 
			'config' => 'brief'
		)
	)
);?>

<div class='tabs'>
  &nbsp;
</div>

<?php echo $this->Html->image("/files/home/apoio.png"

); ?>