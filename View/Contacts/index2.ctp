<div id="page-title">
	<span class="title">Entre em contato</span>
	<span class="subtitle">Retornaremos seu contato.</span>
</div>

<div class="one-column">
	<?php echo $this->Form->create('Contact'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('user_id', array('label' => 'Usuário: ', 'type' => 'hidden'));
		echo $this->Form->input('title', array('label' => 'Título: '));
		echo $this->Form->input('alias', array('label' => 'SubTítulo: '));
		echo $this->Form->input('body', array('label' => 'Mensagem: '));
		echo $this->Form->input('name', array('label' => 'Nome: '));
		echo $this->Form->input('phone', array('label' => 'Telefone: '));
		echo $this->Form->input('email', array('label' => 'Email: '));
		echo $this->Form->input('status', array('label' => 'Urgente: ', 'type' => 'hidden'));
		echo $this->Form->input('archive', array('label' => 'Arquivar: ', 'type' => 'hidden'));
		echo $this->Form->input('notify', array('type' => 'hidden'));		
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Enviar')); ?>
</div>


<div class="one-column">
	<!-- content -->
	<p><img src="img/template/map.jpg" alt="map"></p>
	<p>Intituto Federal Goiano.</p>					
	<p>Urutaí - GO<br>
	(64) 9263 4122, (64) 1111 1111<br>
	<a href="mailto:email@server.com">email@server.com</a></p>
	<!-- ENDS content -->
</div>
<!-- ENDS column -->							
