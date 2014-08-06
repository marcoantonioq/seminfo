<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Group')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Course')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Course']['name'], array('controller' => 'courses', 'action' => 'view', $user['Course']['id'])); ?>
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
			<dt><?php echo ucfirst(__('sexo')); ?></dt>
            <dd>
                <?php echo h($user['User']['sexo']); ?>
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
			<dt><?php echo ucfirst(__('phone')); ?></dt>
            <dd>
                <?php echo h($user['User']['phone']); ?>
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
			<dt><?php echo ucfirst(__('holding_count')); ?></dt>
            <dd>
                <?php echo h($user['User']['holding_count']); ?>
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
            <dt><?php echo ucfirst(__('Courses')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Courses']['name'], array('controller' => 'courses', 'action' => 'view', $user['Courses']['id'])); ?>
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

			<?php echo $this->Html->link('Novo '.__('user'),
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