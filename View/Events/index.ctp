<?php $this->extend('/Common/Events/index'); ?>

<?php 
$this->assign('title', 'Eventos'); 
$this->assign('subtitle', 'Participe dos eventos no IFGoiano - Urutaí'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>

<?php echo $this->element('/Events/index', array(), array('cache' => array('key' => 'Elemente_Events_index', 'config' => 'brief'))); ?>




<div class="panes">	
	<!-- Contents -->
	
	<div style="display: block;">
		
		<ul class="blocks-thumbs thumbs-rollover">
		
			<?php foreach ($events as $event): ?>
				<li>
					<?php if(!empty($event['Event']['file_dir'])){
						echo $this->Html->image($event['Event']['file_dir'],
							array(
								'alt' => 'Imagem: '.$event['Event']['name'],
								'width' => "270px",
								'height'=>'150px',
								'url' => array(
									'controller' => 'events',
									'action' => 'view',
									$event['Event']['id']
								)
							)
						);
					}else{
						echo $this->Html->image(
						'/img/template/596x270.gif', 
						array(
							'width' => "270px",
							'height'=>'150px',
							'alt' => 'Post'
						)
						);
					} ?>
					
					
					<div class="excerpt">
						<?= $this->Html->link($event['Event']['name'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']), array('class' => 'header', 'title' => 'Saiba tudo sobre '.$event['Event']['name']) ); ?>
					</div>
					<?php /*echo $this->Html->link('<span>Saiba mais</span>',
						array(
							'controller' => 'events',
							'action' => 'view',
							$event['Event']['id']
						),
						array(
							'class' => 'link-button',
							'escape' => false,
							'title' => 'Saiba tudo sobre '.$event['Event']['nome']
						)
					);*/ ?>
				</li>			
			<?php endforeach; ?>
				<li>
					<a href="http://200.137.237.7/seminfo2013/index.php" target=”new”>
                                            
                                             <?php   echo $this->Html->image(
						'/img/upload/seminfo2013.png'
                                                     ,array(
								'alt' => 'Imagem: '.$event['Event']['name'],
								'width' => "270px",
								'height'=>'150px',	
							)
						); ?>
					</a>
					<div class="excerpt">
						<a href="http://200.137.237.7/seminfo2013/index.php" target=”new” class="header" title="Ainda não pegou seu certificado da Seminfo 2013 ">SEMINFO 2013</a>
					</div>
				</li>
		</ul>
	</div>
</div>



<?php // echo $this->element('pagination');?>

<?php $this->end() ?>

<!--
	END Bloco
-->
