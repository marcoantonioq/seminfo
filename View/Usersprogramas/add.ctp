<?php $this->extend('/Common/Programas/index'); ?>

<?php 
$this->assign('title', 'Confirmar inscrição'); 
$this->assign('subtitle', ''.((empty($programa['Programa']['nome']))?'':$programa['Tipoprograma']['title'].' - '.$programa['Programa']['nome'])); 
?>
<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<div class="">
	<?php if(!empty($programa)): ?>
	<div class="panes">	
		<ul>
			<li>
				<ul class="meta">
					<?php if(!empty($programa['Palestrante'])): ?>
					<?php foreach ($programa['Palestrante'] as $palestrante): ?>
					<li><strong>Palestrantes: </strong><?= $palestrante['nome'] ?></li>
					<?php endforeach; ?>
					<li><strong>Local: </strong><?= (empty($programa['Programa']['local']))?'A definir':$programa['Programa']['local'] ?></li>
					<?php endif; ?>
					
					<li><h5>Horário:
						<?php 
						if(date('d', strtotime($programa['Horario']['inicio'])) == date('d', strtotime($programa['Horario']['termino']))):
							echo date(' d/m  H:i', strtotime($programa['Horario']['inicio'])).' - '.
							date('H:i', strtotime($programa['Horario']['termino']));
						else:
							echo 'de '.
								date('d/m ', strtotime($programa['Horario']['inicio'])).' á '.
								date('d/m', strtotime($programa['Horario']['termino'])).' das '.
								date('H:i ', strtotime($programa['Horario']['inicio'])).' as '.
								date('H:i', strtotime($programa['Horario']['termino']));
						endif;
						?>
					</h5></li>
				</ul>
			</li>
			</p>
		</ul>
	</div>
	<?php endif; ?>
	<?php echo $this->Form->create('Usersprograma'); ?>
		<fieldset>
		<?php
			echo $this->Form->input('user_id');
			echo $this->Form->input('programa_id');
			echo $this->Form->input('status', array('label' => 'Confirmar participação.'));
			echo $this->Form->input('reservas', array(
				'type' => 'hidden',
				'label' => 'Não tenho certeza se vou participar! Ou, não possuir vagas! Marque como cadastro de reserva.'
			));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Confirmar cadastro')); ?>
	</div>
	<?php echo $this->Html->link('Voltar à página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>
<?php $this->end() ?>
<!--
	END Bloco
-->
