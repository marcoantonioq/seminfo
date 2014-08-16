<br><?= $this->Form->create('User'); ?>
<div id="login">
    <fieldset>
        <legend><?php echo __('Login'); ?></legend>
        <?php
            echo $this->Form->input('email', array(
                'label'=>'Email: '
            ));
            echo $this->Form->input('password', array(
                'label'=>'Senha: '
            ));
            
            echo $this->Form->submit(
                'Enviar'
            );
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<br><?= $this->Html->link('Voltar','javascript:history.back()',array('class'=>'btn btn-success'));?>
<br><?= $this->Html->link('Não sou cadastrado.', array('controller' => 'users', 'action' => 'add')) ?>
<br><?= $this->Html->link('Não consegue acessar a sua conta?', array('controller' => 'users', 'action' => 'recuperar')) ?>