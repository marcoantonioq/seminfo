Enviaremos um nova senha para seu e-mail cadastrado.
<br><?= $this->Form->create('recuperar'); ?>
<div id="login">
    <fieldset>
        <?php
            echo $this->Form->input('email', array(
                'label'=>'Email: '
            ));
            echo $this->Form->input('cpf', array(
                'id' => 'cpf',
                'pattern' => "^\d{3}.\d{3}.\d{3}-\d{2}$",
                'label'=>'CPF: '
            ));
          
            echo $this->Form->submit(
                __('Submit'),
                array(
                    'class'=>'btn primary'
                )
            );
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<br><?= $this->Html->link('Voltar','javascript:history.back()',array('class'=>'btn btn-success'));?>
<br><?= $this->Html->link('Não sou cadastrado.', array('controller' => 'users', 'action' => 'add')) ?>


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
      id('cpf').onkeyup = function(){
        mascara( this, mCPF );
      }
    }
</script>