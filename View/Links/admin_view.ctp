<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($link['Link']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('ParentLink')); ?></dt>
            <dd>
                <?php echo $this->Html->link($link['ParentLink']['id'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Menu')); ?></dt>
            <dd>
                <?php echo $this->Html->link($link['Menu']['id'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($link['Link']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('class')); ?></dt>
            <dd>
                <?php echo h($link['Link']['class']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($link['Link']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('link')); ?></dt>
            <dd>
                <?php echo h($link['Link']['link']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('target')); ?></dt>
            <dd>
                <?php echo h($link['Link']['target']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('rel')); ?></dt>
            <dd>
                <?php echo h($link['Link']['rel']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($link['Link']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('lft')); ?></dt>
            <dd>
                <?php echo h($link['Link']['lft']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('rght')); ?></dt>
            <dd>
                <?php echo h($link['Link']['rght']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('visibility_roles')); ?></dt>
            <dd>
                <?php echo h($link['Link']['visibility_roles']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('params')); ?></dt>
            <dd>
                <?php echo h($link['Link']['params']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($link['Link']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($link['Link']['created']); ?>
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