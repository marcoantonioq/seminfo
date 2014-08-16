<?php $this->extend('/Common/Programas/index'); ?>

<?php 
	$this->assign('title', 'Programas'); 
	$this->assign('subtitle', '');
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	
	<div class="">
	<?php if (!empty($programas)): ?>
		<div class="panes">	
			<ul>
				<?php foreach ($programas as $programa): ?>
					<li>
						<h2>
							<?php echo $this->Html->link(
								$programa['Tipoprograma']['title'].' - '.$programa['Programa']['nome'],
								array(
									'controller'=>'programas',
									'action'=>'view',
									$programa['Programa']['id']
								)
							); ?>
						</h2>
						<h5><?= $programa['Event']['nome'] ?></h5>
						<p>
							<?= $programa['Programa']['descricao']; ?>							
						</p>

						<li>
							<?php

								if(date('d', strtotime($programa['Horario']['inicio'])) == date('d', strtotime($programa['Horario']['termino']))):
									echo ' Horário: <strong> '.
									date('d/m H:i', strtotime($programa['Horario']['inicio'])).' as '.
									date('H:i', strtotime($programa['Horario']['termino'])).'</strong>';
								else:
									echo ' Horário: <strong>de '.
										date('d/m ', strtotime($programa['Horario']['inicio'])).' á '.
										date('d/m', strtotime($programa['Horario']['termino'])).' das '.
										date('H:i ', strtotime($programa['Horario']['inicio'])).' as '.
										date('H:i', strtotime($programa['Horario']['termino'])).'</strong>';
								endif;
							?>
						</li>
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
								<?php if($programa['Programa']['status'] && ($programa['Programa']['usersprograma_count'] < $programa['Programa']['vagas']) && ($programa['Programa']['status'] == true)): ?>
									<?php echo $this->Html->link(
										'<span>Inscreva-se</span>',
										array(
											'controller' => 'usersprogramas', 
											'action' => 'add', 
											$programa['Programa']['id']
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

	<?php echo $this->element('pagination');?>	

	</div>
<?php $this->end() ?>

<!--
	END Bloco
-->
