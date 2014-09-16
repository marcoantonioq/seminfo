<?php

$this->extend('/Common/Events/view'); ?>

<?php 
	$this->assign('title', $event['Event']['name']); 
	$this->assign('subtitle', $event['Event']['realization']); 
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
					echo $this->Html->image($event['Event']['file_dir'],
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
				<?= $event['Event']['description']; ?>
            </div>
            <ul class="meta">
                <li><strong>Inscrição: </strong> <?php echo ($event['Event']['status'] == 1 ? 'Aberta' : 'Encerrada'); ?></li>
                <li><strong>Inicio do evento: </strong> 
				<?php echo date('d/m/Y', strtotime($event['Event']['first'])); ?>
                    até 
				<?php echo date('d/m/Y', strtotime($event['Event']['last'])); ?>
                </li>
            </ul>
            </p>
		<?php if($event['Event']['status'] == 1): ?>
			<?php echo $this->Html->link(
				'<span>Programação do Evento</span>',
				array('controller'=>'programs', 'action'=>'index'),
				array(
					'escape' => false,
					'id'=>'link',
					'class'=>'link-button-big'
				)
			); ?>
            <br />
            <br />
		<?php endif; ?>
        </div>							
    </div>
</div>
<?php $this->end() ?>

<!--
        END Bloco
-->
	<?php if (!empty($event['Program'])): ?>
</p>
<h3>Program: </h3>
<div class="panes">	
    <ul>
				<?php foreach ($event['Program'] as $program):   ?>
        <hr>
        <li>
            <h6>
						<?php echo $this->Html->link(
							$program['Typeprograms']['title'].' - '.$program['name'],
							array(
								'controller' => 'programs',
								'action' => 'view',
								$program['id']
							)
						); ?>
            </h6>

						<?php if(!empty($program['Speakers'])): ?>
            <strong>Palestrantes: </strong>
						<?php foreach ($program['Speakers'] as $speaker): ?>
							<?= $this->Html->link($speaker['nome'], array(
								'controller'=>'speakers', 'action' =>'view',$speaker['id']
							)); ?>;
						<?php endforeach; ?>
						<?php endif; ?>
        </li>
        </p>
				<?php endforeach; ?>
    </ul>
</div>		
	<?php endif; ?>
