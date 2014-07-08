<div class="usersprogramas form">
<?php echo $this->Form->create('Usersprograma'); ?>
	<fieldset>
		<legend><?php echo __('Presença'); ?></legend>
	<?php
		echo $this->Form->input('programa_id', array(
			'empty' => 'Selecione programa',
			'label' => 'Programa: '
		));
		echo $this->Form->input('codigo', array(
			'label' => 'Leitor código de barra(usuário):',
			'placeholder'=> 'Entre com código',
			'onkeydown'=>'bloquearCtrlJ();',
			'autofocus' => true
		));
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
	</ul>
</div>

<script>
	function bloquearCtrlJ(){   // Verificação das Teclas  
	    var tecla=window.event.keyCode;   //Para controle da tecla pressionada  
	    var ctrl=window.event.ctrlKey;    //Para controle da Tecla CTRL  

	    if (ctrl && tecla==74){    //Evita teclar ctrl + j  
	        event.keyCode=0;  
	        event.returnValue=false;  
	    }  
	}  
</script>