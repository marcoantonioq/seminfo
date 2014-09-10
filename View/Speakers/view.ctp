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
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['nome'])
							);
						}else{
							echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['nome'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3><?=$speaker['Speaker']['nome']; ?></h3>
					
					<?=$speaker['Speaker']['descricao']; ?>
					</p>

					<?php if (!empty($speaker['Speaker']['email'])): ?>

						<li><strong>Email: </strong><a href="mailto:<?=$speaker['Palestrante']['email']; ?>">
							<?=$speaker['Speaker']['email']; ?></a>
						</li>
					<?php endif; ?>

					<?php if (!empty($palestrante['Speaker']['twitter'])): ?>
						<li><strong>Twitter: </strong><?=$speaker['Speaker']['twitter']; ?></li>
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['facebook'])): ?>
						<li><strong>Facebook: </strong><?=$speaker['Speaker']['facebook']; ?></li>
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Speaker']['blog'])): ?>
						<li><strong>Site: </strong><?=$palestrante['Palestrante']['blog']?></li>
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Speaker']['linkedin'])): ?>
						<li><strong>Linkedin: </strong><?=$palestrante['Speaker']['linkedin']; ?></li>
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['lattes'])): ?>
						<li><strong>Lattes: </strong><?=$palestrante['Palestrante']['lattes']; ?></li>
					<?php endif; ?>
					</div>					
				</p>
				<div class='clearfix'></div>
			</ul>
		</div>	

	<?php if (!empty($palestrante['Programa'])): ?>
	<h3><?php echo 'Contribuições'; ?></h3>
		<div class="panes">	
			<ul>
				<?php foreach ($palestrante['Programa'] as $programa): ?>
					<li>
						<h2>
							<?php echo $this->Html->link(
								$programa['nome'],
								array(
									'controller'=>'programas',
									'action'=>'view',
									$programa['id']
								)
							); ?>
						</h2>
						<p>
							<?= $programa['descricao']; ?>							
						</p>
						<ul class="meta">
							<?php if(!empty($programa['Palestrante'])): ?>
							<?php foreach ($programa['Palestrante'] as $palestrante): ?>
							<li><strong>Palestrantes: </strong><?= $palestrante['nome'] ?></li>
							<li><?= $palestrante['descricao'] ?></li>
							<li><strong>Email </strong><?= $palestrante['email'] ?></li>							
							<?php endforeach; ?>
							<?php endif; ?>
							<li>
								<?php if($programa['status'] && ($programa['usersprograma_count'] < $programa['vagas']) && ($programa['status'] == true)): ?>
									<?php echo $this->Html->link(
										'<span>Inscreva-se</span>',
										array(
											'controller' => 'usersprogramas', 
											'action' => 'add', 
											$programa['id']
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