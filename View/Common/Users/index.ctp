<div id="page-title">
	<span class="title"><?php echo $this->fetch('title'); ?></span>
	<span class="subtitle"><?php echo $this->fetch('subtitle'); ?></span>
</div>

<?php echo $this->fetch('contents') ?>

<div class="actions">
	<h3><?php echo __('Mais'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Perfil'), array('controller' => 'users','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Mensagens'), array('controller' => 'users', 'action' => 'mensagens')); ?> </li>
		<li><?php echo $this->Html->link(__('Participações'), array('controller' => 'usersprogramas', 'action' => 'index')); ?> </li>
	</ul>
</div>