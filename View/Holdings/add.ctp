<div id="page-title">
	<span class="title">
		<?php
			foreach ($events as $key => $evento) {
				echo $evento." ";
				break;
			}
		?>
	</span>
	<span class="subtitle">Cadastrar participação no evento</span>
</div>

<?php echo $this->Form->create('Holding'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('user_id', array('label' => 'Usuário:'));
		echo $this->Form->input('event_id', 
			array(
				'label' => 'Confirmar evento: ', 
				'empty' => 'Selecione um evento'
			)
		);
		echo $this->Form->input('comissa',
			array(
				'label' => 'Comissão',
				'type' => 'hidden'
			)
		);
		echo $this->Form->input('description', 
			array(
				'label' => 'Descrição', 
				'type' => 'hidden'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Participar')); ?>
