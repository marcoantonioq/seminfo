<?php
$crumbs = $this->Html->getCrumbs(' > ', array(
    'text' => $this->Html->image('/administration/img/template/icons/home.png'),
    'url' => array('controller' => 'pages', 'plugin'=>false, 'action' => 'display', 'home'),
    'escape' => false
));

?>
<?php if (!empty($crumbs)): ?>
	<div class="breadcrumb">
		<?php echo $crumbs; ?>
	</div>
<?php endif; ?>
