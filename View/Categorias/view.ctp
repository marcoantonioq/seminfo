<?php $this->extend('/Common/Contents/index'); ?>

<?php 
	$this->assign('title', 'Categoria '.$categoria['Categoria']['alias']); 
	$this->assign('subtitle', 'Conteúdos'); 
?>


<!--
	Bloco contents
-->

<?php $this->start('contents'); ?>
	<div id="posts" class="single">
		<?php if (!empty($categoria['Content'])): ?>
		<?php
			$i = 0;
			foreach ($categoria['Content'] as $content): ?>
				<div class="post">
					<h1><?php echo $this->Html->link(
						$content['title'],
						array(
							'controller' => 'contents', 
							'action' => 'view', 
							$content['id'])
						); ?>
					</h1>
					
					<div class="thumb-shadow">
						<div class="post-thumbnail">
							<?php if(!empty($content['file_dir'])){
								echo $this->Html->image(
								'/files/content/file/'.$content['file_dir'].'/'.$content['file'],
								array(
									/*'width' => "596px",
									'height'=>'270px', */
									'alt' => $content['file']
								)
								);
							}else{
								echo $this->Html->image(
								'/img/template/596x270.gif', 
								array(
									/*'width' => "596px",
									'height'=>'270px',  */
									'alt' => 'Post'
								)
								);
							} ?>
						</div>
						<div>
							<?php 
							$limite = 1000;
							if (strlen($content['body']) <= $limite) {
								echo $content['body'];							
							}else{
								echo substr($content['body'], 0, $limite).'... '.$this->Html->link('leia mais', array(
									'controller'=>'contents',
									'action'=>'view',
									$content['id']
								));
							}

							?>
						</div>
					</div>
				</div>			
			<?php endforeach; ?>
			<?php else: ?>
		<h1>Nenhum resultado foi retornado pela consulta</h1>
		<?php endif; ?>
	</div>
	
<!--
	END Bloco contents
-->
<?php $this->end(); ?>