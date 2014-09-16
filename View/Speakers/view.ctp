<?php $this->extend('/Common/Programas/index'); ?>

<?php 
	$this->assign('title', 'Palestrante'); 
	$this->assign('subtitle', $speaker['Speaker']['name']); 
?>
<!--
	Bloco
-->
<?php $this->start('contents'); ?>

<div class="panes">	
				<div class='floatleft foto'><?php 
						if(!empty($speaker['Speaker']['file_dir'])){
							echo $this->Html->image($speaker['Speaker']['file_dir'],
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['name'],'title'=> $speaker['Speaker']['name'],
								'url' => array(
									'controller' => 'speakers',
									'action' => 'view',
									$speaker['Speaker']['id'])
							));
						}else{
					echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['name'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3><?=$speaker['Speaker']['name']; ?></h3>
					
					<?=$speaker['Speaker']['description']; ?>
					</p>

					<?php if (!empty($speaker['Speaker']['email'])): ?>

						<li><strong>Email: </strong><a href="mailto:<?=$speaker['Speaker']['email']; ?>">
							<?=$speaker['Speaker']['email']; ?></a>
						</li>
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['twitter'])): ?>
						<li><strong>Twitter: </strong><?=$speaker['Speaker']['twitter']; ?></li>
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['facebook'])): ?>
						<li><strong>Facebook: </strong><?=$speaker['Speaker']['facebook']; ?></li>
					<?php endif; ?>
					
					<?php if (!empty($speaker['Speaker']['blog'])): ?>
						<li><strong>Site: </strong><?=$speaker['Speaker']['blog']?></li>
					<?php endif; ?>
					
					<?php if (!empty($speaker['Speaker']['linkedin'])): ?>
						<li><strong>Linkedin: </strong><?=$speaker['Speaker']['linkedin']; ?></li>
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['lattes'])): ?>
						<li><strong>Lattes: </strong><?=$speaker['Speaker']['lattes']; ?></li>
					<?php endif; ?>
					</div>					
				</p>
				<div class='clearfix'></div>
			</ul>
		</div>	

	<?php if (!empty($speaker['Program'])): ?>
	<h3><?php echo 'Contribuições'; ?></h3>
		<div class="panes">	
			<ul>
				<?php foreach ($speaker['Program'] as $program): ?>
					<li>
						<h2>
							<?php echo $this->Html->link(
								$program['name'],
								array(
									'controller'=>'programs',
									'action'=>'view',
									$program['id']
								)
							); ?>
						</h2>
						<p>
							<?= $program['description']; ?>							
						</p>
						<ul class="meta">
							<?php if(!empty($program['Speaker'])): ?>
							<?php foreach ($program['Speaker'] as $speaker): ?>
							<li><strong>Palestrantes: </strong><?= $speaker['nome'] ?></li>
							<li><?= $speaker['description'] ?></li>
							<li><strong>Email </strong><?= $speaker['email'] ?></li>							
							<?php endforeach; ?>
							<?php endif; ?>
							<li>
								<?php if($program['status'] && ($program['holding_count'] < $program['vagas']) && ($program['status'] == true)): ?>
									<?php echo $this->Html->link(
										'<span>Inscreva-se</span>',
										array(
											'controller' => 'holdings', 
											'action' => 'add', 
											$program['id']
										),
										array(
											'escape' => false,
											'class'=>'link-button'
										)
									); ?>
                                                                        <?php else:
                                                                        
                                                                                echo $this->Html->link(
                                                                                            '<span>Esgotado</span>',
                                                                                            array(
                                                                                                    'controller' => 'programs', 
                                                                                                    'action' => 'index', 
                                                                                                    $program['id']
                                                                                            ),
                                                                                            array(
                                                                                                    'escape' => false,
                                                                                                    'class'=>'link-button'
                                                                                            )
                                                                                    ); ?>
               
								<?php endif; ?>
							</li>
							
						</ul>
					</li>
				</p>
				<hr>
				<?php endforeach; ?>
			</ul>
		</div>		
		
	<?php endif; ?>
<?php echo $this->Html->link('Voltar à página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>
<?php $this->end(); ?>