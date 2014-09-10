<div id="page-title">
	<span class="title"><?php echo h($course['Course']['name']); ?></span>
	<span class="subtitle"><?php echo h($course['Course']['description']); ?></span>
</div>
<div id="posts" class="single">
	<div class="post">

		<div class="thumb-shadow">
			<div class="post-thumbnail">
				<?php if(!empty($course['Course']['file_dir'])){
					echo $this->Html->image($course['Course']['file_dir'],
					array(
						'width' => "596px",
						'height'=>'270px', 
						'alt' => $course['Course']['file']
					)
					);
				}else{
					echo $this->Html->image(
					'/img/template/596x270.gif', 
					array(
						'width' => "596px",
						'height'=>'270px',
						'alt' => 'Cursos'
					)
					);
				} ?>
			</div>
			<div>
				<?= $course['Course']['body']; ?>
			</div>
		</div>
	</div>
</div>
<ul id="sidebar">
	<li>
		<h6><?php echo $this->Html->link('Cursos', array('controller' => 'courses', 'action' => 'index')); ?></h6>		
		<ul>
				<li class="cat-item" >
					<?php echo $this->Html->link('TADS', array('controller' => 'courses', 'action' => 'view',1)); ?>
				</li>
                                <li class="cat-item" >
					<?php echo $this->Html->link('GTI', array('controller' => 'courses', 'action' => 'view',2)); ?>
				</li>
                            <li ></li>
		</ul>
	</li>
</ul>

