<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('alias')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['alias']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('class')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['class']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('weight')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['weight']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('link_count')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['link_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('params')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['params']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['created']); ?>
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