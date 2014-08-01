<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($event['Event']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('nome')); ?></dt>
            <dd>
                <?php echo h($event['Event']['nome']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('local')); ?></dt>
            <dd>
                <?php echo h($event['Event']['local']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('publicado')); ?></dt>
            <dd>
                <?php echo h($event['Event']['publicado']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($event['Event']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('inicio')); ?></dt>
            <dd>
                <?php echo h($event['Event']['inicio']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('termino')); ?></dt>
            <dd>
                <?php echo h($event['Event']['termino']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('realizacao')); ?></dt>
            <dd>
                <?php echo h($event['Event']['realizacao']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('descricao')); ?></dt>
            <dd>
                <?php echo h($event['Event']['descricao']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('organizacao')); ?></dt>
            <dd>
                <?php echo h($event['Event']['organizacao']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('holding_count')); ?></dt>
            <dd>
                <?php echo h($event['Event']['holding_count']); ?>
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