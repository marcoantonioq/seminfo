<div class="post" style="">
<h2><?php  echo __('Conteudo '); echo h($type['Type']['title']); ?></h2>
	
</div>

<div class="related">
	<?php if (!empty($type['Content'])): ?>
	
	<?php
		$i = 0;
		foreach ($type['Content'] as $content): ?>
		
                <div class="post">
				<h1><?php echo $this->Html->link($content['title'], array('controller' => 'contents', 'action' => 'view', $content['id'])); ?></h1>
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
			<hr>
       
	<?php endforeach; ?>
	</div>

            <?php endif; ?>

	
