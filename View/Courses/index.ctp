<div id="page-title">
	<span class="title">Cursos</span>
	<span class="subtitle">Nossos cursos</span>
</div>

<div id="projects-list">


	<div class="panes">	
		<!-- Contents -->
		<div style="display: block;">
			
			<ul class="blocks-thumbs thumbs-rollover">
				<?php foreach ($courses as $course): ?>
				<li>
					<?php if(!empty($course['Course']['file_dir'])){
						echo $this->Html->link(
						$this->Html->image($course['Course']['file_dir'],array(
								'width' => "282px",
								'height'=>'150px')),
						array(
							'controller' => 'courses',
							'action' => 'view',
							$course['Course']['id']
						),
						array(
							'escape' => false,
						)
					); 
					}else{
						echo $this->Html->image(
							'/img/template/596x270.gif', 
							array(
								'width' => "282px",
								'height'=>'150px',  
								'alt' => 'Post'
								)
							);
						} ?>
					
					<?php echo $this->Html->link(
						"<h6>".$course['Course']['name'].' - '.$course['Course']['description']."<h6>",
						array(
							'controller' => 'courses',
							'action' => 'view',
							$course['Course']['id']
						),
						array(
							'escape' => false,
						)
					); ?>
				</li>			
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<?php echo $this->element('pagination');?>
	
</div>