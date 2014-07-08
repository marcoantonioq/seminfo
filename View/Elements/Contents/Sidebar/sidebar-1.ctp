<ul id="sidebar">
	<li>
		<h6><?php echo $this->Html->link('Categorias', '') ?></h6>
		<ul>			
			<?php $categorias = $this->requestAction('Categorias/index'); ?>
			
			<?php foreach($categorias as $key => $categoria): ?>
				<li class="cat-item" >
					<?php echo $this->Html->link($categoria['Categoria']['alias'], 
						array(
							'controller' => 'categorias', 
							'action' => 'view', $categoria['Categoria']['id'])
					); ?>
				</li>
			<?php endforeach; ?>
			<li ></li>
		</ul>
	</li>
</ul>