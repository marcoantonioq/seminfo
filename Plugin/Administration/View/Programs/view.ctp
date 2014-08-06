<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($program['Program']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Event')); ?></dt>
            <dd>
                <?php echo $this->Html->link($program['Event']['name'], array('controller' => 'events', 'action' => 'view', $program['Event']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Typeprogram')); ?></dt>
            <dd>
                <?php echo $this->Html->link($program['Typeprogram']['title'], array('controller' => 'typeprograms', 'action' => 'view', $program['Typeprogram']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($program['Program']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('local')); ?></dt>
            <dd>
                <?php echo h($program['Program']['local']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($program['Program']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('price')); ?></dt>
            <dd>
                <?php echo h($program['Program']['price']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('vagas')); ?></dt>
            <dd>
                <?php echo h($program['Program']['vagas']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('reservations')); ?></dt>
            <dd>
                <?php echo h($program['Program']['reservations']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('duration')); ?></dt>
            <dd>
                <?php echo h($program['Program']['duration']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('content')); ?></dt>
            <dd>
                <?php echo h($program['Program']['content']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date_begin')); ?></dt>
            <dd>
                <?php echo h($program['Program']['date_begin']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date_end')); ?></dt>
            <dd>
                <?php echo h($program['Program']['date_end']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('time_begin')); ?></dt>
            <dd>
                <?php echo h($program['Program']['time_begin']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('time_end')); ?></dt>
            <dd>
                <?php echo h($program['Program']['time_end']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('min_presence')); ?></dt>
            <dd>
                <?php echo h($program['Program']['min_presence']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($program['Program']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($program['Program']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certify')); ?></dt>
            <dd>
                <?php echo h($program['Program']['certify']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certify_speakers')); ?></dt>
            <dd>
                <?php echo h($program['Program']['certify_speakers']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($program['Program']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($program['Program']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($program['Program']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('holdding_count')); ?></dt>
            <dd>
                <?php echo h($program['Program']['holdding_count']); ?>
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

			<?php echo $this->Html->link('Novo '.__('program'),
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