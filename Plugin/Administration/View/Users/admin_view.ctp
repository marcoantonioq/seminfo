<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('group_id')); ?></dt>
            <dd>
                <?php echo h($user['User']['group_id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('curso_id')); ?></dt>
            <dd>
                <?php echo h($user['User']['curso_id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('matricula')); ?></dt>
            <dd>
                <?php echo h($user['User']['matricula']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($user['User']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('sexo_id')); ?></dt>
            <dd>
                <?php echo h($user['User']['sexo_id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('username')); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('password')); ?></dt>
            <dd>
                <?php echo h($user['User']['password']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('cpf')); ?></dt>
            <dd>
                <?php echo h($user['User']['cpf']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('telefone')); ?></dt>
            <dd>
                <?php echo h($user['User']['telefone']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($user['User']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('website')); ?></dt>
            <dd>
                <?php echo h($user['User']['website']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image')); ?></dt>
            <dd>
                <?php echo h($user['User']['image']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image_dir')); ?></dt>
            <dd>
                <?php echo h($user['User']['image_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('message_count')); ?></dt>
            <dd>
                <?php echo h($user['User']['message_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('usersprograma_count')); ?></dt>
            <dd>
                <?php echo h($user['User']['usersprograma_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($user['User']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($user['User']['created']); ?>
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