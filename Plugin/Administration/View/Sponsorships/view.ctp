<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('website')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['website']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('sponsorship'),
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