<?php $this->extend('/Common/Contents/index'); ?>
<?php 
	$this->assign('title', 'Conteúdos'); 
	$this->assign('subtitle', 'Notícias, Artigos...'); 
?>
<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<div id="posts" class="single">
		<?php foreach ($contents as $content): ?>			
			<div class="post">
				<h1><?php echo $this->Html->link($content['Content']['title'], array('controller' => 'contents', 'action' => 'view', $content['Content']['id'])); ?></h1>
				<div class="thumb-shadow">
					<div class="post-thumbnail">
						<?php if(!empty($content['Content']['file_dir'])){
							echo $this->Html->image($content['Content']['file_dir'],
							array(
								/*'width' => "596px",
								'height'=>'270px', */
								'alt' => $content['Content']['file']
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
						if (strlen($content['Content']['body']) <= $limite) {
							echo $content['Content']['body'];							
						}else{
							echo substr($content['Content']['body'], 0, $limite).'... '.$this->Html->link('leia mais', array(
								'controller'=>'contents',
								'action'=>'view',
								$content['Content']['id']
							));
						}

						?>
					</div>
				</div>
			</div>
			<hr>
		<?php endforeach; ?>
		
		<?php echo $this->element('pagination');?>
		
	</div> 

<?php $this->end() ?>

<!--
	END Bloco
-->
