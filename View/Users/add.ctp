<?php $this->extend('/Common/Users/add'); ?>

<?php 
	$this->assign('title', 'Usuários'); 
	$this->assign('subtitle', 'Cadastro'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
<div class="">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		 echo $this->Form->input(
        	'curso_id', 
        	array(
        		'empty' => 'Selecione',
        		'label' => 'Estuda nesta instiução?',
        		'div'=>'clearfix',
        		'type' => 'hidden'
    		)
		);
		echo $this->Form->input(
			'matricula', 
			array(
				'label' => 'Qual sua matricula?', 
				'div'=>'clearfix',
        		'type' => 'hidden'
			)
		);
		echo $this->Form->input(
			'name', 
			array(
				'label' => 'Nome completo: ',
				'placeholder' => 'Digite seu nome...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'group_id', 
			array(
				//'empty' => 'Selecione',
				'value' => 2,
				'label' => 'Grupo',
				'div'=>'clearfix',
				'type' => 'hidden'
			)
		);
		echo $this->Form->input(
			'sexo_id', 
			array(
				'label' => 'Sexo',
				'empty' => 'Selecione',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->hidden(
			'username', 
			array(
				'placeholder' => 'Digite seu username...',
				'label' => 'Nome do usuário:',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'status',
			array(
				'checked' => true,
				'type' => 'hidden',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'email', 
			array(
				'placeholder' => 'Digite E-mail...',
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'cpf', 
			array(
				'id' => 'cpf',
				'div'=>'clearfix',
				'maxLength'=>'14',
				'placeholder' => 'Digite cpf...',
				'pattern' => "^\d{3}.\d{3}.\d{3}-\d{2}$",
				'placeholder'=>"11111111111"
			)
		);
		echo $this->Form->input(
			'telefone', 
			array(
				'placeholder' => 'xx11111111',
				'div'=>'clearfix',
				'id' => 'telefone',
				'pattern' => '\(\d{2}\) \d{4}-\d{4}'
			)
		);
		echo $this->Form->input(
			'password',
			array(
				'placeholder' =>'Digite senha...',
				'label' => 'Senha: ', 
				'div'=>'clearfix'
			)
		);
		echo $this->Form->input(
			'password2',
			array(
				'placeholder' => 'Confirmar senha...',
				'label' => __('Confirme a senha:'), 
				'type' => 'password', 
				'div'=>'clearfix',
			)
		);
		echo $this->Form->input(
			'website',
			array(
				'type' => 'hidden',
				'div'=>'clearfix',
			)
		);
		echo $this->Form->input(
			'image', 
			array(
				'label' ,'Foto',
				'div'=>'clearfix',
				'type' => 'hidden',
			)
		);
		echo $this->Form->input(
			'image_dir', 
			array(
				'type' => 'hidden',
				'div'=>'clearfix'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>

<script type="text/javascript">
	/* Máscaras ER */
	function mascara(o,f){
	    v_obj=o
	    v_fun=f
	    setTimeout("execmascara()",1)
	}

	function execmascara(){
	    v_obj.value=v_fun(v_obj.value)
	}

	function mtel(v){
	    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
	    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
	    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
	    return v;
	}

	function mCPF(v){
	    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
	    v=v.replace(/^(\d{6})(\d)/g,"$1.$2");
	    v=v.replace(/^(\d{3})(\d)/g,"$1.$2");
	    v=v.replace(/(\d)(\d{2})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
	    return v;
	}

	function id( el ){
	  return document.getElementById( el );
	}

	window.onload = function(){
	  id('telefone').onkeyup = function(){
	    mascara( this, mtel );
	  }
	  id('cpf').onkeyup = function(){
	    mascara( this, mCPF );
	  }
	}
</script>

<?php $this->end() ?>

<!--
	END Bloco
-->
