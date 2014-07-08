[<?php $this->extend('/Common/Users/index'); ?>

<?php 
	$this->assign('title', $this->request->data['User']['name']); 
	$this->assign('subtitle', 'Editar cadastro'); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>

	<div class="users form">
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __(''); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input(
				'name', 
				array(
					'label' => 'Nome: ',
					'placeholder' => 'Digite seu nome...',
					'div'=>'clearfix'
				)
			);

			echo $this->Form->input(
				'cpf', 
				array(
					'type' =>'hidden'
				)
			);
			echo $this->Form->input(
				'matricula', 
				array(
					'label' => 'Qual sua matricula?', 
					'div'=>'clearfix'
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

			echo $this->Form->input(
				'group_id', 
				array(
					//'empty' => 'Selecione',
					//'value' => 2,
					'label' => 'Grupo',
					'div'=>'clearfix',
					'type' => 'hidden'
				)
			);

			echo $this->Form->input(
				'username', 
				array(
					'placeholder' => 'Digite seu username...',
					'label' => 'User name:',
					'div'=>'clearfix'
				)
			);
			echo $this->Form->input(
				'email',
				array(
					'placeholder' => 'Digite E-mail...',
					'div'=>'clearfix',
					'type' => 'hidden',
				)
			);
			echo $this->Form->input(
				'telefone', 
				array(
					'placeholder' => 'Digite telefone...',
					'div'=>'clearfix',
					'required' => true,
					'id' =>'telefone',
					'pattern' => '\(\d{2}\) \d{4}-\d{4}'
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
			echo $this->Form->input(
				'holding_count', 
				array(
					'div'=>'clearfix',
					'type' => 'hidden',
				)
			);
			echo $this->Form->input(
				'password',
				array(
					'placeholder' =>'Digite senha...',
					'label' => 'Senha: ', 
					'value' => '',
					'div'=>'clearfix',
				)
			);
			echo $this->Form->input(
				'password2',
				array(
					'placeholder' => 'Confirmar senha...',
					'label' => __('Confirme a senha:'), 
					'type' => 'password', 
					'div'=>'clearfix',
					'required' => true
				)
			);
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Enviar')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		</ul>
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


