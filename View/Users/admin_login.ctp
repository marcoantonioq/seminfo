<?php
echo $this->Form->create('User', array('action' => 'login'));
?>

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
                __('Submit'), 
                array(
                    'class'=>'btn primary'
                )
            );
        ?>

    </fieldset>
</div>
<?php echo $this->Form->end(); ?>
