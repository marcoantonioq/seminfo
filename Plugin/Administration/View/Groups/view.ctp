<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($group['Group']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($group['Group']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($group['Group']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($group['Group']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('modified')); ?></dt>
            <dd>
                <?php echo h($group['Group']['modified']); ?>
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

			<?php echo $this->Html->link('Novo '.__('group'),
                array( 'action' => 'edit', $this->params['pass'][0]),
                array('class'=> 'btn btn-block')
            ); ?>
            <?php echo $this->Html->link('Editar',
                array( 'action' => 'edit', $this->params['pass'][0]),
                array('class'=> 'btn btn-block')
            ); ?>			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
		</div>
	</div>

</div>