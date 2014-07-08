<?php $this->extend('/Common/Programas/index'); ?>

<?php 
	$this->assign('title', 'Horários'); 
	$this->assign('subtitle', 'Horários programas'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>

<script type="text/javascript">
	function view(id){
		if(document.getElementById('programa'+id).style.display == 'none'){
			document.getElementById('programa'+id).style.display = 'block';
		}else{
			document.getElementById('programa'+id).style.display = 'none'
		}
	}
</script>
	<div class="">
		<h2><?php $msg = null; ?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('inicio', 'Horário'); ?></th>
				<th></th>
		</tr>
		<?php foreach ($horarios as $horario): ?>
		<?php if(!empty($horario['Programa'])): ?>
		<!-- <?php if($msg  != date('d/m/Y',strtotime($horario['Horario']['inicio']))|| $msg == null): ?>
		<tr>
			<td colspan='2' class='font-shadow'>
				<strong>
				<?php 
					echo 'Data: '.date('d/m/Y',strtotime($horario['Horario']['inicio']));
					$msg = date('d/m/Y',strtotime($horario['Horario']['inicio']));
				?>
				</strong>
			</td>
		</tr>
		<?php endif; ?> -->
			<?php foreach ($horario['Programa'] as $programa): ?>
			<tr>
				<td>
					<h5>
					<?php echo $this->Html->link(
						$programa['Tipoprograma']['title'].' - '.$programa['nome'],
						array(
							'controller' => 'programas',
							'action' => 'view',
							$programa['id']
						)
					)?>
					</h5>
					<?php
						echo $programa['Event']['nome'].', ';
						echo (empty($programa['local']))? '' : 'Local: '.$programa['local'].',';
						if(date('d', strtotime($horario['Horario']['inicio'])) == date('d', strtotime($horario['Horario']['termino']))):
							echo ' Horário: <strong>'.
							date('d/m \d\a\s H:i', strtotime($horario['Horario']['inicio'])).' as '.
							date('H:i', strtotime($horario['Horario']['termino'])).'</strong>';
						else:
							echo ' Horário: <strong>de '.
								date('d/m ', strtotime($horario['Horario']['inicio'])).' á '.
								date('d/m', strtotime($horario['Horario']['termino'])).' das '.
								date('H:i ', strtotime($horario['Horario']['inicio'])).' as '.
								date('H:i', strtotime($horario['Horario']['termino'])).'</strong>';
						endif;
						if($programa['vagas'] > 0)
							if($programa['vagas'] - $programa['usersprograma_count']){
								echo ', Vagas: '.($programa['vagas'] - $programa['usersprograma_count']); 								
							}else{
								echo ", <span class='red'>Não há vagas.</span>";
							}
					?>
				</td>

				<td width='100px'>
					<?php if( ($programa['usersprograma_count'] < $programa['vagas']) && ($programa['status'] == true)): ?>
						<?php 
						echo $this->Html->link(
							'<span>Inscreva-se</span>',
							array(
								'controller' => 'usersprogramas',
								'action' => 'add',
								$programa['id']
							),
							array(
								'escape' => false,
								'class'=>'link-button'
							)
						); 
						/*elseif(($programa['vagas'] > 0) && ($programa['status'] == true) ): echo $this->Html->link(
							'<span>Fila espera</span>',
							array(
								'controller' => 'usersprogramas',
								'action' => 'add',
								$programa['id']
							),
							array(
								'escape' => false,
								'class'=>'link-button'
							)
						); */

					?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan='2' id="programa<?=$programa['id']?>" style="display: none;">
		 			<?= $programa['descricao']?>
				</td>
			</tr>
			<?php endforeach; ?>
	<?php endif; ?>
	<?php endforeach; ?>
		</table>
		<?php echo $this->element('pagination'); ?>
	</div>
	
<?php $this->end() ?>

<!--
	END Bloco
-->
