<div class="row-fluid">
    <div class="span8">     

    <?php 
            echo $this->Form->create('Filter');
            
            $this->Form->inputDefaults(array(
                'label'=>false,
                'div'=>false,
                'class'=>'span6',
                'autocomplete'=>'off',
                'onfocus'=>'this.select();',
            ));

            $options = array(
                '=' => 'igual',
                'LIKE' => 'contenha',
                'NOT LIKE' => 'não contenha',
                'LIKE BEGIN' => 'começando com',
                'LIKE END' => 'terminando com',
                '!=' => 'diferente',
                '>'  => 'maior do que',
                '>=' => 'maior ou igual a',
                '<'  => 'menor que',
                '<=' => 'menor ou igual a'
            );
            
     ?>
        
     <?php echo $this->fetch('contents'); ?>

    <?php   
        echo $this->Form->input('Pagination.limit', array(
            'label'=>"Limite",
            'type'=>'select',
            'options'=> array(
                '20'=>'20',
                '50'=>'50',
                '100'=>'100',
                '500'=>'500',
                '1000'=>'1000',
                '10000'=>'10000'
            ),
            'default'=>10,
            "class"=>"span2",
            'onchange'=>'this.form.submit();'
        ));
    ?> 

    
    <?php 
        echo  $this->Form->button('Buscar', array(
        'class'=>'btn',
        'style'=>'margin-bottom: 10px;'
        )); 
    ?>

    <?php echo $this->Form->end( ); ?>
    <?php echo $this->element('pagination'); ?>
    </div>

    <dib class="span4">
        <div class="actions well">
            <h3>Menu</h3>
            <?php echo $this->Html->link(__('Novo'), array('action' => 'add'), array('class'=>'btn btn-block')); ?>
            <?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index'), array('class'=>'btn btn-block')); ?>           
            <?php echo $this->Html->link(__('Sexo'), array('controller' => 'sexos', 'action' => 'add'), array('class'=>'btn btn-block')); ?>    
            
        </div>
    </dib>
</div>