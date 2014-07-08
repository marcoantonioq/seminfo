<div id="page-title">
	<span class="title">Cursos</span>
	<span class="subtitle">Nossos cursos</span>
</div>

<div id="projects-list">


	<div class="panes">	
		<!-- Contents -->
		<div style="display: block;">
			
			<ul class="blocks-thumbs thumbs-rollover">
				<?php foreach ($cursos as $curso): ?>
				<li>
					<?php if(!empty($curso['Curso']['file_dir'])){
						echo $this->Html->link(
						$this->Html->image('/files/curso/file/'.$curso['Curso']['file_dir'].'/'.$curso['Curso']['file'],array(
								'width' => "282px",
								'height'=>'150px', 
								'alt' => $curso['Curso']['file'])),
						array(
							'controller' => 'cursos',
							'action' => 'view',
							$curso['Curso']['id']
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
						"<h6>".$curso['Curso']['nome'].' - '.$curso['Curso']['descricao']."<h6>",
						array(
							'controller' => 'cursos',
							'action' => 'view',
							$curso['Curso']['id']
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