<?php $this->extend('/Common/Events/index'); ?>

<?php 
$this->assign('title', 'Participações'); 
$this->assign('subtitle', 'Em eventos'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
<?php if(!empty($holdings)): ?>
	<div class="panes">	
		<!-- Contents -->
		
		<div style="display: block;">
			
			<ul class="blocks-thumbs thumbs-rollover">
				<?php foreach ($holdings as $event): ?>
				<li>
					<a href="/holdings/view/<?= $event['Holding']['id'] ?>" class="thumb" title="Imagem">
						<?php if(!empty($event['Event']['file_dir'])){
							echo $this->Html->image(
								'/files/event/file/'.$event['Event']['file_dir'].'/'.$event['Event']['file'],
								array(
									'width' => "270px",
									'height'=>'150px',
									'alt' => $event['Event']['file']
									)
								);
						}else{
							echo $this->Html->image(
								'/img/template/596x270.gif', 
								array(
									'width' => "150px",
									'height'=>'270px',
									'alt' => 'Post'
									)
								);
							} ?>
						</a>
						<div class="excerpt">
							<?= $this->Html->link($event['Event']['nome'], array('controller' => 'holdings', 'action' => 'view', $event['Holding']['id']), array('class' => 'header') ); ?>
						</div>
						<?php 
						echo $this->Html->link(
							'<span>Mais →</span>',
							array('controller'=>'holdings', 'action'=>'view'),
							array('escape' => FALSE, "class" =>"link-button")
							);
							?>
						</li>			
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php echo $this->element('pagination');?>	

	<?php else: ?>

	<h2>Você ainda não esta participando?</h2>
	<?php echo $this->element('/Events/index', array(), array('cache' => array('key' => 'Elemente/Events/index', 'config' => 'elemente_events_index_log'))); ?>
	
	
<?php endif; ?>

<?php $this->end() ?>

<!--
	END Bloco
-->
