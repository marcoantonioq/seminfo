<?php $this->extend('/Common/Programas/view'); ?>

<?php 
	$this->assign('title', 'Programa'); 
	$this->assign('subtitle', $programa['Programa']['nome']);
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
					if(!empty($programa['Programa']['file_dir'])){
						echo $this->Html->image(
						'/files/programa/file/'.$programa['Programa']['file_dir'].'/'.$programa['Programa']['file'],
						array(
							'width' => "596px",
							'height'=>'270px', 
							'alt' => $programa['Programa']['file']
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
				<?= $programa['Programa']['descricao']; ?>
				<?php if(!empty($programa['Programa']['conteudo'])): ?>
				<h3>Conteúdo</h3>
				<?php endif; ?>
				<?= $programa['Programa']['conteudo']; ?>
			</div>
		</div>
		<ul class="meta">
			<?php if(!empty($programa['Programa']['vagas'])): ?>
			<!-- <li><strong>Inscritos: </strong> <?= $programa['Programa']['usersprograma_count']?></li> -->
			<li><strong>Vagas: </strong>
				<?php 
					if($programa['Programa']['vagas'] - $programa['Programa']['usersprograma_count']){
						echo ($programa['Programa']['vagas'] - $programa['Programa']['usersprograma_count']); 								
					}else{
						echo "<span class='red'>Não há vagas.</span>";
					}
				 ?>
			</li>
			<?php endif; ?>
			<li><strong>Local: </strong> <?= $programa['Programa']['local']; ?></li>
			<li>
				<?php
					if(date('d', strtotime($programa['Horario']['inicio'])) == date('d', strtotime($programa['Horario']['termino']))):
						echo ' Horário: <strong>das '.
						date('H:i', strtotime($programa['Horario']['inicio'])).' as '.
						date('H:i - d/m', strtotime($programa['Horario']['termino'])).'</strong>';
					else:
						echo ' Horário: <strong>de '.
							date('d/m ', strtotime($programa['Horario']['inicio'])).' á '.
							date('d/m', strtotime($programa['Horario']['termino'])).' das '.
							date('H:i ', strtotime($programa['Horario']['inicio'])).' as '.
							date('H:i', strtotime($programa['Horario']['termino'])).'</strong>';
					endif;
				 ?>
			</li>
			
			<?php 
					$datetime1 = new DateTime($programa['Horario']['inicio']);
					$datetime2 = new DateTime($programa['Horario']['termino']);
					$interval = $datetime1->diff($datetime2);
			 ?>
		</ul>
		</p>
		<?php if(($programa['Programa']['usersprograma_count'] < $programa['Programa']['vagas']) && ($programa['Programa']['status'] == true)): ?>
		<?php echo $this->Html->link(
			'<span>Inscreva-se<span>', array(
				'controller' => 'usersprogramas',
				'action' => 'add',
			 	$programa['Programa']['id']
			),
			array(
				'escape' => false,
				'class' => 'link-button-big'
			)
		); 
		?>
		<?php endif; ?>
	</div>
	
	
			
		<?php if (!empty($programa['Palestrante'])): ?>
		<h3><?php echo __('Palestrante'); ?></h3>
		<div class="panes">	
			<ul>
				<?php foreach ($programa['Palestrante'] as $palestrante): ?>
					
					<div class='floatleft foto'><?php 
						if(!empty($palestrante['file_dir'])){
							echo $this->Html->image('/files/palestrante/file/'.$palestrante['file_dir'].'/'.$palestrante['file'],
								array('width' => '200', 'height' => '200', 'alt' => $palestrante['nome'])
							);
						}else{
							echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $palestrante['nome'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3>
						<?= $this->Html->link($palestrante['nome'], array(
							'controller' => 'palestrantes',
							'action' => 'view',
							$palestrante['id']
						));?>
					</h3>
						<?php if (!empty($palestrante['Programa'])): ?>
						<strong>Contribuição: </strong>
							<?php foreach ($palestrante['Programa'] as $key => $programa): ?>
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
						<?=$palestrante['descricao']; ?>
					</p>

					<?php if (!empty($palestrante['email'])): ?>
						<a href="mailto:<?=$palestrante['email']; ?>">Email</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['twitter'])): ?>
							<a href="http://<?=$palestrante['twitter']; ?>" title="Twitter">Twitter</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['facebook'])): ?>
							<a href="http://<?=$palestrante['facebook']; ?>" target='_black' title="Facebook">Facebook</a>;
					<?php endif; ?>
					
					<?php if (!empty($palestrante['blog'])): ?>
						<a href="http://<?=$palestrante['blog']?>" target='_black' title="Saite <?=$palestrante['Palestrante']['nome'] ?>">Site</a>;
					<?php endif; ?>
					
					<?php if (!empty($palestrante['linkedin'])): ?>
						<a href="http://<?=$palestrante['linkedin']; ?>" target='_black' title="Linkedin">Linkedin</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['lattes'])): ?>
						<a href="http://<?=$palestrante['lattes']; ?>" target='_black' title="Lattes">Lattes</a>;
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

