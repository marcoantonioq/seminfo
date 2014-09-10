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
                <?php pr($programs); ?>  
	<?php if (!empty($programs)): 
      
            ?>
		<div class="panes">	
			<ul>
				<?php foreach ($programs as $program): ?>
					<li>
						<h2>
							<?php echo $this->Html->link(
								$program['Typeprogram']['title'].' - '.$program['Program']['name'],
								array(
									'controller'=>'programs',
									'action'=>'view',
									$program['Program']['id']
								)
							); ?>
						</h2>
						<h5><?= $program['Event']['name'] ?></h5>
						<p>
							<?= $program['Program']['description']; ?>							
						</p>

						<li>
							<?php

								if(date('d', strtotime($program['Program']['date_begin'])) == date('d', strtotime($program['Program']['date_end']))):
									echo ' Horário: <strong> '.
									date('d/m H:i', strtotime($program['Program']['date_begin'])).' as '.
									date('H:i', strtotime($program['Program']['date_end'])).'</strong>';
								else:
									echo ' Horário: <strong>de '.
										date('d/m ', strtotime($program['Program']['date_begin'])).' á '.
										date('d/m', strtotime($program['Program']['date_end'])).' das '.
										date('H:i ', strtotime($program['Program']['time_begin'])).' as '.
										date('H:i', strtotime($program['Program']['time_end'])).'</strong>';
								endif;
							?>
						</li>
						</p>
						<ul class="meta">
							<?php if(!empty($speakers['Palestrante'])): ?>
							<?php foreach ($speakers['$Speaker'] as $speaker): ?>
							<li><strong>Palestrantes: </strong><?= $program['name'] ?></li>
							<li><?= $program['description'] ?></li>
							<li><strong>Email </strong><?= $speaker['email'] ?></li>							
							<?php endforeach; ?>
							<?php endif; ?>
							<li>
								<?php if($program['Program']['status'] && ($program['Program']['holding_count'] < $program['Program']['vagas']) && ($program['Program']['status'] == true)): ?>
									<?php echo $this->Html->link(
										'<span>Inscreva-se</span>',
										array(
											'controller' => 'holdings', 
											'action' => 'add', 
											$program['Program']['id']
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
