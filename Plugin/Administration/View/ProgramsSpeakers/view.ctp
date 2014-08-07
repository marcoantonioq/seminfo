<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($programsSpeaker['ProgramsSpeaker']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certificado')); ?></dt>
            <dd>
                <?php echo h($programsSpeaker['ProgramsSpeaker']['certificado']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Program')); ?></dt>
            <dd>
                <?php echo $this->Html->link($programsSpeaker['Program']['name'], array('controller' => 'programs', 'action' => 'view', $programsSpeaker['Program']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Speaker')); ?></dt>
            <dd>
                <?php echo $this->Html->link($programsSpeaker['Speaker']['name'], array('controller' => 'speakers', 'action' => 'view', $programsSpeaker['Speaker']['id'])); ?>
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

			<?php echo $this->Html->link('Novo '.__('programsSpeaker'),
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
