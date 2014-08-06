<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($message['Message']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($message['Message']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('body')); ?></dt>
            <dd>
                <?php echo h($message['Message']['body']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('notify')); ?></dt>
            <dd>
                <?php echo h($message['Message']['notify']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($message['Message']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($message['Message']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($message['Message']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('message'),
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