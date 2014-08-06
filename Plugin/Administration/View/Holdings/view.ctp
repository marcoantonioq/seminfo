<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('User')); ?></dt>
            <dd>
                <?php echo $this->Html->link($holding['User']['name'], array('controller' => 'users', 'action' => 'view', $holding['User']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Program')); ?></dt>
            <dd>
                <?php echo $this->Html->link($holding['Program']['name'], array('controller' => 'programs', 'action' => 'view', $holding['Program']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certificado')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['certificado']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('credenciado')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['credenciado']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('reservas')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['reservas']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('presenca')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['presenca']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($holding['Holding']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('holding'),
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