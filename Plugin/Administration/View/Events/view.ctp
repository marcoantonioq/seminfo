<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($event['Event']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($event['Event']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('local')); ?></dt>
            <dd>
                <?php echo h($event['Event']['local']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('published')); ?></dt>
            <dd>
                <?php echo h($event['Event']['published']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($event['Event']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('first')); ?></dt>
            <dd>
                <?php echo h($event['Event']['first']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('last')); ?></dt>
            <dd>
                <?php echo h($event['Event']['last']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('realization')); ?></dt>
            <dd>
                <?php echo h($event['Event']['realization']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($event['Event']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('organization')); ?></dt>
            <dd>
                <?php echo h($event['Event']['organization']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('president')); ?></dt>
            <dd>
                <?php echo h($event['Event']['president']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($event['Event']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($event['Event']['file_dir']); ?>
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

			<?php echo $this->Html->link('Novo '.__('event'),
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