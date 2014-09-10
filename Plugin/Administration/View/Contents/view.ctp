<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($content['Content']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('User')); ?></dt>
            <dd>
                <?php echo $this->Html->link($content['User']['name'], array('controller' => 'users', 'action' => 'view', $content['User']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Type')); ?></dt>
            <dd>
                <?php echo $this->Html->link($content['Type']['title'], array('controller' => 'types', 'action' => 'view', $content['Type']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($content['Content']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('body')); ?></dt>
            <dd>
                <?php echo $content['Content']['body']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($content['Content']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('promote')); ?></dt>
            <dd>
                <?php echo h($content['Content']['promote']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('path')); ?></dt>
            <dd>
                <?php echo h($content['Content']['path']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($content['Content']['file']); ?>
                <?php echo $this->Html->image($content['Content']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($content['Content']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($content['Content']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($content['Content']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('content'),
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
