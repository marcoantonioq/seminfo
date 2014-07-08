<div id="page-title">
	<span class="title"><?php echo $this->fetch('title'); ?></span>
	<span class="subtitle"><?php echo $this->fetch('subtitle'); ?></span>
</div>

<?php echo $this->element('/Events/filter', array(), array('cache' => array('key' => 'Elemente/Events/filter', 'config' => 'day'))); ?>

<?php echo $this->fetch('contents') ?>


<?php $this->start('sidebar'); ?>
  <?php echo $this->element('Programas/sidebar'); ?>
<?php $this->end() ?>