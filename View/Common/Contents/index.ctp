<div id="page-title">
	<span class="title"><?php echo $this->fetch('title'); ?></span>
	<span class="subtitle"><?php echo $this->fetch('subtitle'); ?></span>
</div>

<?php
	echo $this->element('Contents/filter', array(), array('cache' => array('key' => 'Contents/filter', 'config' => 'view_long')));	
?>

<?php echo $this->fetch('contents') ?>


<?php $this->start('sidebar'); ?>
  <?php echo $this->element('Contents/Sidebar/sidebar-1'); ?>
<?php $this->end() ?>

