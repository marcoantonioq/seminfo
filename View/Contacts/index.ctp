<div id="page-title">
	<span class="title">Entre em contato</span>
	<span class="subtitle">Retornaremos seu contato.</span>
</div>

<div class="one-column">
	<?php echo $this->Form->create('Contact'); ?>
	
	<fieldset>

	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('name',array('type' => 'hidden'));
                echo $this->Form->input('title');
		echo $this->Form->input('alias',array('label' => 'Arquivar: ', 'type' => 'hidden'));
		echo $this->Form->input('body');
		echo $this->Form->input('phone',array('type' => 'hidden'));
		echo $this->Form->input('email',array('type' => 'hidden'));
		echo $this->Form->input('status', array('label' => 'Arquivar: ', 'type' => 'hidden'));
		echo $this->Form->input('archive', array('label' => 'Arquivar: ', 'type' => 'hidden'));
		echo $this->Form->input('notify', array('label' => 'Arquivar: ', 'type' => 'hidden'));
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Enviar')); ?>
</div>


<div class="one-column">
	<!-- content -->
	</p>
	<?php 
            echo $this->Html->image('/img/template/map.jpg', array('alt'=>'IFGoiano - Urutaí'));
	?>
	<p>Instituto Federal Goiano - Campus Urutaí - Rodovia Geraldo Silva Nascimento Km 2,5. CEP 75790-000 - Urutaí - Goiás - Brasil. Fone/Fax: (64) 3465-1900.<br>
	<a href="mailto:seminfo@ifgoiano.edu.br">seminfo@ifgoiano.edu.br</a></p>
	<!-- ENDS content -->
</div>
<!-- ENDS column -->							
