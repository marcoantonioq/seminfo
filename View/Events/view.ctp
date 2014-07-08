<?php $this->extend('/Common/Events/view'); ?>

<?php 
	$this->assign('title', $event['Event']['nome']); 
	$this->assign('subtitle', $event['Event']['realizacao']); 
?>


<!--
	Bloco
-->
<?php $this->start('contents'); ?>
<div id="posts" class="single">
	<div class="post">
		<div class="thumb-shadow">
			<div class="post-thumbnail">
				<?php if(!empty($event['Event']['file_dir'])){
					echo $this->Html->image(
					'/files/event/file/'.$event['Event']['file_dir'].'/'.$event['Event']['file'],
					array(
						'width' => "596px",
						'height'=>'270px', 
						'alt' => $event['Event']['file']
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
				} ?>
			</div>
			<div class="the-excerpt">
				<?= $event['Event']['descricao']; ?>
			</div>
		<ul class="meta">
			<li><strong>Inscrição: </strong> <?php echo ($event['Event']['status'] == 1 ? 'Aberta' : 'Encerrada'); ?></li>
			<li><strong>Inicio do evento: </strong> 
				<?php echo date('d/m/Y', strtotime($event['Event']['inicio'])); ?>
				até 
				<?php echo date('d/m/Y', strtotime($event['Event']['termino'])); ?>
			</li>
		</ul>
		</p>
		<?php if($event['Event']['status'] == 1): ?>
			<?php echo $this->Html->link(
				'<span>Programação do Evento</span>',
				array('controller'=>'programas', 'action'=>'index'),
				array(
					'escape' => false,
					'id'=>'link',
					'class'=>'link-button-big'
				)
			); ?>
		<?php endif; ?>
		</div>							
	</div>
</div>
<?php $this->end() ?>

<!--
	END Bloco
-->
	<?php if (!empty($event['Programa'])): ?>
		</p>
		<h3>Programas: </h3>
		<div class="panes">	
			<ul>
				<?php foreach ($event['Programa'] as $programa): ?>
				<hr>
					<li>
						<h6>
						<?php echo $this->Html->link(
							$programa['Tipoprograma']['title'].' - '.$programa['nome'],
							array(
								'controller' => 'programas',
								'action' => 'view',
								$programa['id']
							)
						); ?>
						</h6>
						
						<?php if(!empty($programa['Palestrante'])): ?>
						<strong>Palestrantes: </strong>
						<?php foreach ($programa['Palestrante'] as $palestrante): ?>
							<?= $this->Html->link($palestrante['nome'], array(
								'controller'=>'palestrantes', 'action' =>'view',$palestrante['id']
							)); ?>;
						<?php endforeach; ?>
						<?php endif; ?>
					</li>
				</p>
				<?php endforeach; ?>
			</ul>
	</div>		
	<?php endif; ?>
