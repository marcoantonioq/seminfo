<?php 
    if(!empty($this->request->params['prefix'])){
        $this->Html->addCrumb($this->request->params['prefix'], array($this->request->params['prefix']=>true, 'controller'=>'pages', 'action'=>'home')); 
    }
    $this->Html->addCrumb(__($title_for_layout), array('action'=> 'index')); 
    foreach ($this->request->params['pass'] as $key => $value) {
        $this->Html->addCrumb( $value); 
    }
?>

<?php //echo $this->fetch('outros') ?>

<div class="row-fluid">

    <div class="span12" >
    <div class="well">
        <h3>
            <span><?= $this->fetch('title'); ?></span>
        </h3>
        
        <div class="controls form-inline">
            <?php echo $this->Link->icon('Novo ('. __($this->String->singular($title_for_layout)).')', 
                'icon16 icomoon-icon-checkmark white',
                array( 'action' => 'add'),
                array('class'=> 'btn btn-success')
            ); ?>
            <?php 
                //echo $this->fetch('filter'); 
            ?>
            <?php echo $this->Form->input('Filter.conditions.0', array(
                'class'=>'input-small',
                'div'=>false,
                'label'=>false,
                // 'empty'=>'buscar...',
                'options' => array(
                    '='  => 'igual',
                    'LIKE'       => 'contenha',
                    'NOT LIKE'   => 'não contenha',
                    'LIKE BEGIN' => 'começando com',
                    'LIKE END'   => 'terminando com',
                    '!=' => 'diferente',
                    '>'  => 'maior do que',
                    '>=' => 'maior ou igual a',
                    '<'  => 'menor que',
                    '<=' => 'menor ou igual a'
                ),
                // 'onchange'=>'this.form.submit();'
            )); ?>
            
            <?php echo $this->Form->input('Filter.filter.0', array(
                'class'=>'form-control',
                'autofocus' => true,
                'div'=>false,
                'onkeydown'=>'bloquearCtrlJ();',
                'placeholder' => 'Buscar',
                'size'=>'16',
                'title' => 'Buscar',
                /*'id'=>"appendedInputButton"*/
            )); ?>

            <?php echo $this->Form->button('<span class="input-group-btn"></span>');
            ?>


              <?php echo $this->Form->button('Buscar', array( "class"=>"btn btn-default" )); ?>
            
        </div>

        <div>
            <?php echo $this->fetch('contents') ?>

            <?php 
                echo $this->Form->input('Pagination.limit', array(
                    'type'=>'select',
                    'options'=> array('20'=>'20','50'=>'50','100'=>'100','500'=>'500','1000'=>'1000','10000'=>'10000'),
                    'default'=>10,
                    "class"=>"span2",
                    'onchange'=>'this.form.submit();'
                ));
            ?>
            <?php echo $this->element('pagination'); ?>
        </div>
    </div>
    </div>

    <div class="span4">
        <div class="well ucase">
            <h3><?php echo __('Relacionados'); ?></h3>
            <?php echo $this->fetch('box'); ?>
        </div>
    </div>
</div>

<?php
    for ($i=1; $i < 5; $i++) { 
        echo $this->Form->hidden("Filter.filter.$i");
        // echo $this->Form->hidden("Filter.type.$i");
        echo $this->Form->hidden("Filter.conditions.$i");
    }
?>

<?php echo $this->Form->end(); ?>
