<?php $this->extend('/Common/Programas/index'); ?>

<?php 
	$this->assign('title', 'Palestrantes'); 
	$this->assign('subtitle', 'Programas'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<div class="">
		<table cellpadding="0" cellspacing="0">
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
		</table>
	<?php if (!empty($speakers)): ?>
		<div class="panes">	
			<ul>
				<?php foreach ($speakers as $speaker): ?>
					
					<div class='floatleft foto'><?php 
						if(!empty($speaker['Speaker']['file_dir'])){
							echo $this->Html->image($speaker['Speaker']['file_dir'],
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['name'])
							);
						}else{
							echo $this->Html->image('/img/template/282x267.gif',
								array('width' => '200', 'height' => '200', 'alt' => $speaker['Speaker']['name'])
							);
						}						
					?></div>
				
					<div class='palestrante thumb'>
					<h3><?=$this->Html->link($speaker['Speaker']['name'], array(
						'controller'=>'speakers',
						'action'=>'view',
						$speaker['Speaker']['id']
					)); ?></h3>
					<strong>Contribuição: </strong>
						<?php if (!empty($speaker['Program'])): ?>
							<?php foreach ($palestrante['Program'] as $key => $program): ?>
								<?php 
									echo $this->Html->link(
										$program['nome'].'; ',
										array(
											'controller' => 'programs',
											'action' => 'view',
											$program['id']
										)
									);
								?>
							<?php endforeach; ?>
						</p>
						<?php endif; ?>
					<p>
						<?php 
						$limite = 400;
						if (strlen($speaker['Speaker']['description']) <= $limite) {
							echo $speaker['Speaker']['description'];							
						}else{
							echo substr($speaker['Speaker']['description'], 0, $limite).'... '.$this->Html->link('leia mais', array(
								'controller'=>'speakers',
								'action'=>'view',
								$speaker['Speaker']['id']
							));
						}
						?>
					</p>

					<?php if (!empty($speaker['Speaker']['email'])): ?>
						<a href="mailto:<?=$speaker['Speaker']['email']; ?>">Email</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['twitter'])): ?>
							<a href="<?=$speaker['Speaker']['twitter']; ?>" title="Twitter">Twitter</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['facebook'])): ?>
							<a href="<?=$speaker['Speaker']['facebook']; ?>"  target=”new” title="Facebook">Facebook</a>;
					<?php endif; ?>
					
					<?php if (!empty($speaker['Speaker']['blog'])): ?>
						<a href="http://<?=$speaker['Speaker']['blog']?>" target='_black' title="Saite <?=$speaker['Speaker']['nome'] ?>">Site</a>;
						<a href="" target='_black' title=""></a>
					<?php endif; ?>
					
					<?php if (!empty($speaker['Speaker']['linkedin'])): ?>
						<a href="<?=$speaker['Speaker']['linkedin']; ?>" target='_black' title="Linkedin">Linkedin</a>;
					<?php endif; ?>

					<?php if (!empty($speaker['Speaker']['lattes'])): ?>
						<a href="<?=$speaker['Speaker']['lattes']; ?>" target='_black' title="Lattes">Lattes</a>;
					<?php endif; ?>
					</div>					
				</p>
				<div class='clearfix'></div>
				<hr>
				<?php endforeach; ?>
			</ul>
		</div>		
	<?php endif; ?>

	
	<?php echo $this->element('pagination');?>	
	</div>
</div>
<?php $this->end() ?>

<!--
	END Bloco
-->