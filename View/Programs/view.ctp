<?php $this->extend('/Common/Programas/view'); ?>

<?php 
	$this->assign('title', 'Programa'); 
	$this->assign('subtitle', $program['Program']['name']);
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>


<div id="posts" class="single">
	<div class="post">

		<div class="thumb-shadow">
			<div class="post-thumbnail">
				<?php 
					if(!empty($program['Program']['file_dir'])){
						echo $this->Html->image($program['Program']['file_dir'],
						array(
							'width' => "596px",
							'height'=>'270px', 
							'alt' => $program['Program']['file'],
                                                         'title'=>$program['Program']['name'],
						)
						);
					}else{
						echo $this->Html->image(
						'/img/template/596x270.gif', 
						array(
							'width' => "596px",
							'height'=>'270px',  
							'alt' => 'Post'
						)
						);
					}
				?>
			</div>
			<div class="the-excerpt">
				<?php if(!empty($program['Program']['content'])): ?>
				<h3>Conteúdo</h3>
				<?php endif; ?>
				<?= $program['Program']['content']; ?>
			</div>
		</div>
		<ul class="meta">
			<?php if(!empty($programa['Programa']['vagas'])): ?>
			<!-- <li><strong>Inscritos: </strong> <?= $program['Program']['holding_count']?></li> -->
			<li><strong>Vagas: </strong>
				<?php 
					if($program['Program']['vagas'] - $program['Program']['holding_count']){
						echo ($program['Program']['vagas'] - $program['Program']['holding_count']); 								
					}else{
						echo "<span class='red'>Não há vagas.</span>";
					}
				 ?>
			</li>
			<?php endif; ?>
			<li><strong>Local: </strong> <?= $program['Program']['local']; ?></li>
			<li>
				<?php
					if(date('d', strtotime($program['Program']['time_begin'])) == date('d', strtotime($program['Program']['time_end']))):
						echo ' Horário: <strong>das '.
						date('H:i', strtotime($program['Program']['time_begin'])).' as '.
						date('H:i - d/m', strtotime($program['Program']['time_end'])).'</strong>';
					else:
						echo ' Horário: <strong>de '.
							date('d/m ', strtotime($program['Program']['time_begin'])).' á '.
							date('d/m', strtotime($program['Program']['time_end'])).' das '.
							date('H:i ', strtotime($program['Program']['time_begin'])).' as '.
							date('H:i', strtotime($program['Program']['time_end'])).'</strong>';
					endif;
				 ?>
			</li>
			
			<?php 
					$datetime1 = new DateTime($program['Program']['time_begin']);
					$datetime2 = new DateTime($program['Program']['time_begin']);
					$interval = $datetime1->diff($datetime2);
			 ?>
		</ul>
		</p>
		<?php if($program['Program']['status'] == true): ?>
		<?php echo $this->Html->link(
			'<span>Inscreva-se<span>', array(
				'controller' => 'holdings',
				'action' => 'add',
			 	$program['Program']['id']
			),
			array(
				'escape' => false,
				'class' => 'link-button-big'
			)
		); 
		 else:            
                    echo $this->Html->link(
			'<span>Esgotado<span>', array(
				'controller' => 'programs',
				'action' => 'index'
			),
			array(
				'escape' => false,
				'class' => 'link-button-big'
			)
		); 
                    
                ?>   
		<?php endif; ?>
	</div>
	
	
			
		<?php if (!empty($program['Speaker'])): ?>
		<h3><?php echo __('Palestrante'); ?></h3>
		<div class="panes">	
			<ul>
				<?php foreach ($program['Speaker'] as $speaker): ?>
					
					<div class='floatleft foto'><?php 
						if(!empty($speaker['file_dir'])){
							echo $this->Html->image($speaker['file_dir'],
								array('width' => '200', 'height' => '200', 'alt' => $speaker['name'])
							);
						}else{
							echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $speaker['nome'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3>
						<?= $this->Html->link($speaker['name'], array(
							'controller' => 'speakers',
							'action' => 'view',
							$speaker['id']
						));?>
					</h3>
						<?php if (!empty($speaker['Programa'])): ?>
						<strong>Contribuição: </strong>
							<?php foreach ($speaker['Programa'] as $key => $programa): ?>
								<?php 
									echo $this->Html->link(
										$programa['nome'].'; ',
										array(
											'controller' => 'programas',
											'action' => 'view',
											$programa['id']
										)
									);
								?>
							<?php endforeach; ?>
						</p>
						<?php endif; ?>
					<p>
						<?=$speaker['description']; ?>
					</p>

					<?php if (!empty($speaker['email'])): ?>
						<a href="mailto:<?=$speaker['email']; ?>">Email</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['twitter'])): ?>
							<a href="http://<?=$speaker['twitter']; ?>" title="Twitter">Twitter</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['facebook'])): ?>
							<a href="http://<?=$speaker['facebook']; ?>" target='_black' title="Facebook">Facebook</a>;
					<?php endif; ?>
					
					<?php if (!empty($speaker['blog'])): ?>
						<a href="http://<?=$speaker['blog']?>" target='_black' title="Saite <?=$palestrante['Palestrante']['nome'] ?>">Site</a>;
					<?php endif; ?>
					
					<?php if (!empty($speaker['linkedin'])): ?>
						<a href="http://<?=$speaker['linkedin']; ?>" target='_black' title="Linkedin">Linkedin</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['lattes'])): ?>
						<a href="http://<?=$speaker['lattes']; ?>" target='_black' title="Lattes">Lattes</a>;
					<?php endif; ?>
					</div>					
				</p>
				<div class='clearfix'></div>
				<hr>
			<?php endforeach; ?>
			</ul>
		</div>		
		<?php endif; ?>
	</p>
	<?php echo $this->Html->link('Voltar à página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>
	</div>
	
<?php $this->end() ?>

<!--
	END Bloco
-->

