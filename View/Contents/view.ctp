<?php $this->extend('/Common/Contents/index'); ?>

<?php 
	$this->assign('title', $content['Type']['alias']); 
	$this->assign('subtitle', $content['Content']['title']); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<!-- Posts -->
	<div id="posts" class="single">
		<!-- post -->
		<div class="post">
	
			<h1><?php echo h($content['Content']['title']); ?></h1>
			
			<!-- shadow -->
			<div class="thumb-shadow">
			
				<!-- post-thumb -->
				<div class="post-thumbnail">
					<?php if(!empty($content['Content']['file_dir'])){
						echo $this->Html->image(
						'/files/content/file/'.$content['Content']['file_dir'].'/'.$content['Content']['file'],
						array(
							'width' => "596px",
							/*'height'=>'270px', */
							'alt' => $content['Content']['file']
						)
						);
					}else{
						echo $this->Html->image(
						'/img/template/596x270.gif', 
						array(
							/*'width' => "596px",
							'height'=>'270px',*/
							'alt' => 'Post'
						)
						);
					} ?>
				</div>
				<!-- ENDS post-thumb -->
				<div>
					<?= $content['Content']['body']; ?>		
	
				</div>
			</div>
			<!-- ENDS shadow -->
											
			<!-- meta -->
			<ul>
				<li>
					<!-- <strong>Por </strong>  -->
					<?php 
						/*echo $this->Html->link(
							$content['User']['name'], 
							array(
								'controller' => 'users', 
								'action' => 'view', 
								$content['User']['id']
							)
						); */
					?> 
				</li>
				<hr>
				<li><strong>Criado em </strong> 
					<?php echo date('d/m/Y, H:i', strtotime($content['Content']['created'])); ?> 
				</li>
				<li>
					<strong>Postado em </strong>
					<?php 
						echo $this->Html->link(
							$content['Type']['alias'], 
							array(
								'controller' => 'types', 
								'action' => 'view', 
								$content['Type']['id']
							)
						); 
					?>
				</li>
				<li><strong>Categoria </strong> 
						<?php echo $this->Html->link($content['Categoria']['alias'], array('controller' => 'categorias', 'action' => 'view', $content['Categoria']['id'])); ?>
				</li>				
				<hr>
				<?php echo $this->Html->link('Voltar à página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>	
			</ul>
			<!-- ENDS meta -->							
		</div>
	</div>
	<!-- ENDS Posts -->	
<?php $this->end() ?>

<!--
	END Bloco
-->
						
