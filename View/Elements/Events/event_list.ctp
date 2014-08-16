<div class="panes">	
	<!-- Contents -->
	
	<div style="display: block;">
		
		<ul class="blocks-thumbs thumbs-rollover">
			<?php foreach ($events as $event): ?>
				<li>
					<?php if(!empty($event['Event']['file_dir'])){
						echo $this->Html->image('/files/'.$event['Event']['file_dir'].'/'.$event['Event']['file'],
							array(
								'alt' => 'Imagem: '.$event['Event']['nome'],
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
					<a href="http://ifgoiano.edu.br/urutai/seminfo/">
						<img src="/files/event/file/3/logo.png" alt="Imagem: SEMINFO 2012" width="270px" height="150px">
					</a>
					<div class="excerpt">
						<a href="http://ifgoiano.edu.br/urutai/seminfo/" class="header" title="Saiba tudo sobre SEMINFO 2012">SEMINFO 2012</a>
					</div>
				</li>
		</ul>
	</div>
</div>
