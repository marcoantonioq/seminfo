<?php $this->extend('/Common/Programas/index'); ?>

<?php 
$this->assign('title', 'Confirmar inscrição'); 
$this->assign('subtitle', ''.((empty($programs['Program']['name']))?'':$programs['Typeprogram']['title'].' - '.$programs['Program']['name'])); 
?>
<!--Bloco
-->
<?php $this->start('contents'); ?>
	<div class="">
	<?php if(!empty($programs)): ?>
	<div class="panes">	
		<ul>
			<li>
<!--				<ul class="meta">
					<?php if(!empty($programs['Speaker']['id'])): ?>
					<?php foreach ($programs['Speaker'] as $speaker): ?>
					<li><strong>Palestrantes: </strong><?= $speaker['name'] ?></li>
					<?php endforeach; ?>
					<li><strong>Local: </strong><?= (empty($programs['Program']['local']))?'A definir':$programs['Program']['local'] ?></li>
					<?php endif; ?>
		
                                       
					<li><h5>Horário:
						<?php 
						if(date('d', strtotime($programs['Program']['date_begin'])) == date('d', strtotime($programs['Program']['time_end']))):
							echo date(' d/m  H:i', strtotime($programs['Program']['time_begin'])).' às '.
							date('H:i', strtotime($programs['Program']['time_end']));
						else:
							echo 'de '.
								date('d/m ', strtotime($programs['Program']['date_begin'])).' á '.
								date('d/m', strtotime($programs['Program']['date_end'])).' das '.
								date('H:i ', strtotime($programs['Program']['time_begin'])).' as '.
                                           		date('H:i', strtotime($programs['Program']['time_end']));
						endif;
						?>
					</h5></li>
				</ul>-->
			</li>
			</p>
		</ul>
	</div>
	<?php endif; ?>
	<?php echo $this->Form->create('Holding'); ?>
		<fieldset>
		<?php
			echo $this->Form->input('user_id');
			echo $this->Form->input('program_id');
//			echo $this->Form->input('status', array('label' => 'Confirmar participação.'));
//		echo $this->Form->input('reservas', array(
//				'type' => 'hidden',
//				'label' => 'Não tenho certeza se vou participar! Ou, não possuir vagas! Marque como cadastro de reserva.'
//			));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Confirmar cadastro')); ?>
	</div>

	<?php echo $this->Html->link('Voltar à página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>
<?php $this->end() ?>
<!--
	END Bloco
-->
