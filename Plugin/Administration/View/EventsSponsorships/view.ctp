<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
            <dt><?php echo ucfirst(__('Event')); ?></dt>
            <dd>
                <?php echo $this->Html->link($eventsSponsorship['Event']['name'], array('controller' => 'events', 'action' => 'view', $eventsSponsorship['Event']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Sponsorship')); ?></dt>
            <dd>
                <?php echo $this->Html->link($eventsSponsorship['Sponsorship']['name'], array('controller' => 'sponsorships', 'action' => 'view', $eventsSponsorship['Sponsorship']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($eventsSponsorship['EventsSponsorship']['id']); ?>
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

			<?php echo $this->Html->link('Novo '.__('eventsSponsorship'),
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
