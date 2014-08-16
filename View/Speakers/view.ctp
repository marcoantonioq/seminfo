<?php $this->extend('/Common/Programas/index'); ?>

<?php 
	$this->assign('title', 'Palestrante'); 
	$this->assign('subtitle', $palestrante['Palestrante']['nome']); 
?>


<!--
	Bloco
-->
<?php $this->start('contents'); ?>

<div class="panes">	
				<div class='floatleft foto'><?php 
						if(!empty($palestrante['Palestrante']['file_dir'])){
							echo $this->Html->image('/files/palestrante/file/'.$palestrante['Palestrante']['file_dir'].'/'.$palestrante['Palestrante']['file'],
								array('width' => '200', 'height' => '200', 'alt' => $palestrante['Palestrante']['nome'])
							);
						}else{
							echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $palestrante['Palestrante']['nome'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3><?=$palestrante['Palestrante']['nome']; ?></h3>
					
					<?=$palestrante['Palestrante']['descricao']; ?>
					</p>

					<?php if (!empty($palestrante['Palestrante']['email'])): ?>

						<li><strong>Email: </strong><a href="mailto:<?=$palestrante['Palestrante']['email']; ?>">
							<?=$palestrante['Palestrante']['email']; ?></a>
						</li>
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['twitter'])): ?>
						<li><strong>Twitter: </strong><?=$palestrante['Palestrante']['twitter']; ?></li>
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['facebook'])): ?>
						<li><strong>Facebook: </strong><?=$palestrante['Palestrante']['facebook']; ?></li>
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Palestrante']['blog'])): ?>
						<li><strong>Site: </strong><?=$palestrante['Palestrante']['blog']?></li>
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Palestrante']['linkedin'])): ?>
						<li><strong>Linkedin: </strong><?=$palestrante['Palestrante']['linkedin']; ?></li>
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