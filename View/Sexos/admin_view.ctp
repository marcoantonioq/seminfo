<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($sexo['Sexo']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('nome')); ?></dt>
            <dd>
                <?php echo h($sexo['Sexo']['nome']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('user_count')); ?></dt>
            <dd>
                <?php echo h($sexo['Sexo']['user_count']); ?>
                &nbsp;
            </dd>
		</dl>
	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3>Ações</h3>
			
			<?php echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
			<?php echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>
            <?php			
			echo $this->Html->link('Novo',
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
		</div>
	</div>

</div>