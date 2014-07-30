<?php
$crumbs = $this->Html->getCrumbs(' > ', array(
    'text' => $this->Html->image('template/icons/home.png'),
    'url' => array('controller' => 'pages', 'plugin'=>false, 'action' => 'display', 'home'),
    'escape' => false
));

?>
<?php if (!empty($crumbs)): ?>
	<div class="breadcrumb">
		<?php echo $crumbs; ?>
		<?= $this->Html->link($this->element('layout/img', array('action'=>'back')),
			'javascript:history.back()', 
			array(
				'escape'=>false,
				'class' => 'right'
			)
		);?>

	</div>
<?php endif; ?>
