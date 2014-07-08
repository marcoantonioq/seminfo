<?php $this->extend('/Common/Events/index'); ?>

<?php 
$this->assign('title', 'Eventos'); 
$this->assign('subtitle', 'Participe dos eventos no IFGoiano - Urutaí'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>

<?php echo $this->element('/Events/index', array(), array('cache' => array('key' => 'Elemente_Events_index', 'config' => 'brief'))); ?>

<!-- Não estou utilizando request pois esta no mesmo controller -->
<?php echo $this->element('/Events/event_list', array(), array('cache' => array('key' => 'Elemente_Events_event_list', 'config' => 'brief'))); ?>

<?php // echo $this->element('pagination');?>

<?php $this->end() ?>

<!--
	END Bloco
-->
