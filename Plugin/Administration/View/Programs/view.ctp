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
		
		
<?php if (!empty($program['Holding'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Holding')); return false;">
				<?php echo __('Holdings'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Holding" style="display: none;">
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('user_id'); ?></th>
		<th><?php echo __('program_id'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('certificado'); ?></th>
		<th><?php echo __('credenciado'); ?></th>
		<th><?php echo __('reservas'); ?></th>
		<th><?php echo __('presenca'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('updated'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($program['Holding'] as $holding): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $holding['id']; ?></td>
			<td data-th=<?= ucfirst(__('user_id')) ?> ><?php echo $holding['user_id']; ?></td>
			<td data-th=<?= ucfirst(__('program_id')) ?> ><?php echo $holding['program_id']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $holding['status']; ?></td>
			<td data-th=<?= ucfirst(__('certificado')) ?> ><?php echo $holding['certificado']; ?></td>
			<td data-th=<?= ucfirst(__('credenciado')) ?> ><?php echo $holding['credenciado']; ?></td>
			<td data-th=<?= ucfirst(__('reservas')) ?> ><?php echo $holding['reservas']; ?></td>
			<td data-th=<?= ucfirst(__('presenca')) ?> ><?php echo $holding['presenca']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $holding['created']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $holding['updated']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'holdings', 
						'action' => 'view', 
						$holding['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'holdings', 
						'action' => 'edit', 
						$holding['id']
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


	
		
<?php if (!empty($program['Speaker'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Speaker')); return false;">
				<?php echo __('Speakers'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Speaker" style="display: none;">
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