<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('institution')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['institution']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('phone')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['phone']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('twitter')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['twitter']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('facebook')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['facebook']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('blog')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['blog']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('linkedin')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['linkedin']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('lattes')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['lattes']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($speaker['Speaker']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('speaker'),
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