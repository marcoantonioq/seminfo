<div id="page-title">
	<span class="title"><?php echo h($curso['Curso']['nome']); ?></span>
	<span class="subtitle"><?php echo h($curso['Curso']['descricao']); ?></span>
</div>

<div id="posts" class="single">
	<div class="post">

		<div class="thumb-shadow">
			<div class="post-thumbnail">
				<?php if(!empty($curso['Curso']['file_dir'])){
					echo $this->Html->image(
					'/files/curso/file/'.$curso['Curso']['file_dir'].'/'.$curso['Curso']['file'],
					array(
						'width' => "596px",
						'height'=>'270px', 
						'alt' => $curso['Curso']['file']
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
				<?= $curso['Curso']['body']; ?>
			</div>
		</div>
	</div>
</div>

<ul id="sidebar">
	<li>
		<h6><?php echo $this->Html->link('Cursos', array('controller' => 'cursos', 'action' => 'index')); ?></h6>		
		<ul>
			<?php foreach($cursos as $key => $list): ?>
				<li class="cat-item" >
					<?php echo $this->Html->link($list, array('controller' => 'cursos', 'action' => 'view', $key)); ?>
				</li>
			<?php endforeach; ?>
			<li ></li>
		</ul>
	</li>
</ul>

