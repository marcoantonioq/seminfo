<?php $this->extend('/Common/Events/view'); ?>

<?php 
	$this->assign('title', $holding['Event']['nome'] ); 
	$this->assign('subtitle', 'Participações'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
<div id="posts" class="single">
	<div class="post">

		<div class="thumb-shadow">
			<div class="post-thumbnail">
				<?php if(!empty($holding['Event']['file_dir'])){
					echo $this->Html->image($holding['Event']['file_dir'],
					array(
						'width' => "596px",
						'height'=>'270px', 
						'alt' => $holding['Event']['file']
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
				<?= $holding['Event']['descricao']; ?>
			</div>
		</div>
		<ul class="meta">
			<li><strong>Credenciamento </strong> <?= ($holding['Holding']['credenciamento'] == 1) ? 'Concluido' : 'Aquardando'; ?> </li>
			<li><strong>Bloqueado </strong> <?= ($holding['Holding']['write'] == 1) ? 'Não' : 'Sim'; ?></li>
			<li><strong>Inscrito </strong> <?= $holding['Holding']['created']; ?></li>
			<li><strong>Anexo </strong> 
				<div class="meta-tags">
					<a>Participação <?= $holding['Event']['nome']; ?></a>
				</div>
			</li>
		</ul>
		
	</div>

	<div class="">
		<?php if (!empty($holding['Program'])): ?>
			<h3><?php echo __('Participação em Programas'); ?></h3>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Nome'); ?></th>
				<th><?php echo __('Duracao'); ?></th>
				<th class="actions"></th>
			</tr>
			<?php
				
				$i = 0;
				foreach ($holding['Program'] as $program): ?>
				<tr>
					<td>
						<?php 
						echo $this->Html->link(
							$programa['name'], 
							array(
								'controller' => 'programs', 
								'action' => 'view', 
								$program['id']
							)
						);
						?>
					</td>
					<td><?php echo $program['description']; ?></td>
					<td class="actions">
						<?php 
							echo $this->Form->postLink(
								'Sair', 
								array(
								'controller' => 'holdings_programas',
								'action' => 'delete', 
								$programa['HoldingsPrograma']['id']), 
								null, 
								__('Tem certeza de que deseja excluir # %s?', $program['name'])
							); 
						?>

						<!-- <?php echo $this->Form->postLink(__('Cancelar'), array('controller' => 'holdings_programas', 'action' => 'delete', $programa['HoldingsPrograma']['id']), null, __('Tem certeza de que deseja sair definitivamente %s?', $programa['nome'])); ?> -->
						
						<?php
							if($program['HoldingsPrograma']['certificado'] == 1){
								echo $this->Form->postlink(
									'<span>Certificado</span>', 
									array('controller' => 'holdings', 'action' => 'certificados', $holding['Holding']['id'], $programa['id'].'.pdf'), 
									array('target' => '_blank', 'escape' => FALSE,// "class" =>"link-button"
								));
							}
						?>
						
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>

<?php $this->end() ?>

<!--
	END Bloco
-->
