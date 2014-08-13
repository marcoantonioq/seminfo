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
                <?=$program['Program']['status']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('price')); ?></dt>
            <dd>
                <?=$program['Program']['price']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('vagas')); ?></dt>
            <dd>
                <?=$program['Program']['vagas']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('reservations')); ?></dt>
            <dd>
                <?=$program['Program']['reservations']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('duration')); ?></dt>
            <dd>
                <?=$program['Program']['duration']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('content')); ?></dt>
            <dd>
                <?=$program['Program']['content']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date_begin')); ?></dt>
            <dd>
                <?=$program['Program']['date_begin']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date_end')); ?></dt>
            <dd>
                <?=$program['Program']['date_end']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('time_begin')); ?></dt>
            <dd>
                <?=$program['Program']['time_begin']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('time_end')); ?></dt>
            <dd>
                <?=$program['Program']['time_end']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('min_presence')); ?></dt>
            <dd>
                <?=$program['Program']['min_presence']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?=$program['Program']['file']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?=$program['Program']['file_dir']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certify')); ?></dt>
            <dd>
                <?=$program['Program']['certify']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('certify_speakers')); ?></dt>
            <dd>
                <?=$program['Program']['certify_speakers']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?=$program['Program']['description']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?=$program['Program']['created']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?=$program['Program']['updated']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('holdding_count')); ?></dt>
            <dd>
                <?=$program['Program']['holdding_count']; ?>
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
	
		
<?php if (!empty($program['Speaker'])): ?>

		<h3>
			<a href="#" id="viewtable" >
				<?php echo __('Speakers'); ?>			</a>
		</h3>
		
	<div class="tabela" >
	<table id="tableid2" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('institution'); ?></th>
		<th><?php echo __('phone'); ?></th>
		<th><?php echo __('email'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('twitter'); ?></th>
		<th><?php echo __('facebook'); ?></th>
		<th><?php echo __('blog'); ?></th>
		<th><?php echo __('linkedin'); ?></th>
		<th><?php echo __('lattes'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('file_dir'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('updated'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($program['Speaker'] as $speaker): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $speaker['id']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $speaker['name']; ?></td>
			<td data-th=<?= ucfirst(__('institution')) ?> ><?php echo $speaker['institution']; ?></td>
			<td data-th=<?= ucfirst(__('phone')) ?> ><?php echo $speaker['phone']; ?></td>
			<td data-th=<?= ucfirst(__('email')) ?> ><?php echo $speaker['email']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $speaker['description']; ?></td>
			<td data-th=<?= ucfirst(__('twitter')) ?> ><?php echo $speaker['twitter']; ?></td>
			<td data-th=<?= ucfirst(__('facebook')) ?> ><?php echo $speaker['facebook']; ?></td>
			<td data-th=<?= ucfirst(__('blog')) ?> ><?php echo $speaker['blog']; ?></td>
			<td data-th=<?= ucfirst(__('linkedin')) ?> ><?php echo $speaker['linkedin']; ?></td>
			<td data-th=<?= ucfirst(__('lattes')) ?> ><?php echo $speaker['lattes']; ?></td>
			<td data-th=<?= ucfirst(__('file')) ?> ><?php echo $speaker['file']; ?></td>
			<td data-th=<?= ucfirst(__('file_dir')) ?> ><?php echo $speaker['file_dir']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $speaker['created']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $speaker['updated']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'speakers', 
						'action' => 'view', 
						$speaker['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'speakers', 
						'action' => 'edit', 
						$speaker['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				);

			?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>

<?php endif; ?>


		

</div>
