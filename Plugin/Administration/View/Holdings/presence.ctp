<div class="row-fluid">


    <div class='span8'>     
        <?php 
            echo $this->Form->create('Holding'); 
            $this->Form->inputDefaults(array(
                'class'=>'span12'
            ));
        ?>

        <?php          


            echo $this->Form->input('program_id', array(
                'label'=>ucfirst(__('program_id')),
            ));

            echo $this->Form->input('user_id', array(
                'label'=>ucfirst(__('user_id')),
                'type'=>'text',
                'placeholder'=> 'Entre com código',
                'autofocus' => true
            ));

            echo $this->Form->hidden('presenca', array(
                'label'=>ucfirst(__('presenca')),
                'readonly'=>'true'
            ));
        ?>
        <div class="form-actions form-horizontal">
            <?php             echo $this->Form->button('Enviar', array(
                'class'=>'btn btn-info'
            ))." ";
            echo $this->Form->button('Limpar', array(
                'type'=>'reset',
                'class'=>'btn btn-warning'
            ));
            
            echo $this->Form->end();

            ?>      </div>

    </div>

    <div class="span4">
        <div class="actions form-horizontal well ucase">
            <h3><?php echo __('Actions'); ?></h3>
            
            <?php  echo $this->Html->link('Voltar', 
                array( 'action' => 'index'),
                array('class'=> 'btn btn-block')
            ); ?>
                </div>
    </div>

</div>
