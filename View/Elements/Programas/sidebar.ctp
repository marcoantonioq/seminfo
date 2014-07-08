<ul id="sidebar">
	<li>
		
		<?php $programas = $this->requestAction('Programas/requestIndex');	?>
		<h6><?php echo $this->Html->link('Programas', array('controller' => 'programas', 'action' => 'index')); ?></h6>		
		<ul>
			<?php foreach($programas as $key => $list): ?>
				<li class="cat-item" >
					<?php echo $this->Html->link(
						$list,
						array(
							'controller' => 'programas',
							'action' => 'view',
							$key
						)
					); ?>		
				</li>
			<?php endforeach; ?>
			<li ></li>
		</ul>
	</li>
</ul>
