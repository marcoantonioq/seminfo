<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($document['Document']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Program')); ?></dt>
            <dd>
                <?php echo $this->Html->link($document['Program']['name'], array('controller' => 'programs', 'action' => 'view', $document['Program']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($document['Document']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('author')); ?></dt>
            <dd>
                <?php echo h($document['Document']['author']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('institution')); ?></dt>
            <dd>
                <?php echo h($document['Document']['institution']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($document['Document']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('course')); ?></dt>
            <dd>
                <?php echo h($document['Document']['course']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($document['Document']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($document['Document']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($document['Document']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($document['Document']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('document'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block btn-success')
            ); ?>
            <?php echo $this->Html->link('Editar',
                array( 'action' => 'edit', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-warning')
            ); ?>			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
		</div>
	</div>
</div>


<div class="row-fluid">
			

</div>
