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
	<?php if (!empty($palestrantes)): ?>
		<div class="panes">	
			<ul>
				<?php foreach ($palestrantes as $palestrante): ?>
					
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
					<h3><?=$this->Html->link($palestrante['Palestrante']['nome'], array(
						'controller'=>'palestrantes',
						'action'=>'view',
						$palestrante['Palestrante']['id']
					)); ?></h3>
					<strong>Contribuição: </strong>
						<?php if (!empty($palestrante['Programa'])): ?>
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
						<?php 
						$limite = 400;
						if (strlen($palestrante['Palestrante']['descricao']) <= $limite) {
							echo $palestrante['Palestrante']['descricao'];							
						}else{
							echo substr($palestrante['Palestrante']['descricao'], 0, $limite).'... '.$this->Html->link('leia mais', array(
								'controller'=>'palestrantes',
								'action'=>'view',
								$palestrante['Palestrante']['id']
							));
						}
						?>
					</p>

					<?php if (!empty($palestrante['Palestrante']['email'])): ?>
						<a href="mailto:<?=$palestrante['Palestrante']['email']; ?>">Email</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['twitter'])): ?>
							<a href="<?=$palestrante['Palestrante']['twitter']; ?>" title="Twitter">Twitter</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['facebook'])): ?>
							<a href="<?=$palestrante['Palestrante']['facebook']; ?>" target='_black' title="Facebook">Facebook</a>;
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Palestrante']['blog'])): ?>
						<a href="http://<?=$palestrante['Palestrante']['blog']?>" target='_black' title="Saite <?=$palestrante['Palestrante']['nome'] ?>">Site</a>;
						<a href="" target='_black' title=""></a>
					<?php endif; ?>
					
					<?php if (!empty($palestrante['Palestrante']['linkedin'])): ?>
						<a href="<?=$palestrante['Palestrante']['linkedin']; ?>" target='_black' title="Linkedin">Linkedin</a>;
					<?php endif; ?>

					<?php if (!empty($palestrante['Palestrante']['lattes'])): ?>
						<a href="<?=$palestrante['Palestrante']['lattes']; ?>" target='_black' title="Lattes">Lattes</a>;
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