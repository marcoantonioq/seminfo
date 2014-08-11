<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($event['Event']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($event['Event']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('local')); ?></dt>
            <dd>
                <?php echo h($event['Event']['local']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('published')); ?></dt>
            <dd>
                <?php echo h($event['Event']['published']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($event['Event']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('first')); ?></dt>
            <dd>
                <?php echo h($event['Event']['first']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('last')); ?></dt>
            <dd>
                <?php echo h($event['Event']['last']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('realization')); ?></dt>
            <dd>
                <?php echo h($event['Event']['realization']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($event['Event']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('organization')); ?></dt>
            <dd>
                <?php echo h($event['Event']['organization']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('president')); ?></dt>
            <dd>
                <?php echo h($event['Event']['president']); ?>
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

			<?php echo $this->Html->link('Novo '.__('event'),
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
		
		
<?php if (!empty($event['Program'])): ?>

		<h3>
			<a href="#" id="viewtable" >
				<?php echo __('Programs'); ?>			</a>
		</h3>
		
	<div class="tabela" >
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('event_id'); ?></th>
		<th><?php echo __('typeprogram_id'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('local'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('price'); ?></th>
		<th><?php echo __('vagas'); ?></th>
		<th><?php echo __('reservations'); ?></th>
		<th><?php echo __('duration'); ?></th>
		<th><?php echo __('content'); ?></th>
		<th><?php echo __('date_begin'); ?></th>
		<th><?php echo __('date_end'); ?></th>
		<th><?php echo __('time_begin'); ?></th>
		<th><?php echo __('time_end'); ?></th>
		<th><?php echo __('min_presence'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('file_dir'); ?></th>
		<th><?php echo __('certify'); ?></th>
		<th><?php echo __('certify_speakers'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('holdding_count'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($event['Program'] as $program): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $program['id']; ?></td>
			<td data-th=<?= ucfirst(__('event_id')) ?> ><?php echo $program['event_id']; ?></td>
			<td data-th=<?= ucfirst(__('typeprogram_id')) ?> ><?php echo $program['typeprogram_id']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $program['name']; ?></td>
			<td data-th=<?= ucfirst(__('local')) ?> ><?php echo $program['local']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $program['status']; ?></td>
			<td data-th=<?= ucfirst(__('price')) ?> ><?php echo $program['price']; ?></td>
			<td data-th=<?= ucfirst(__('vagas')) ?> ><?php echo $program['vagas']; ?></td>
			<td data-th=<?= ucfirst(__('reservations')) ?> ><?php echo $program['reservations']; ?></td>
			<td data-th=<?= ucfirst(__('duration')) ?> ><?php echo $program['duration']; ?></td>
			<td data-th=<?= ucfirst(__('content')) ?> ><?php echo $program['content']; ?></td>
			<td data-th=<?= ucfirst(__('date_begin')) ?> ><?php echo $program['date_begin']; ?></td>
			<td data-th=<?= ucfirst(__('date_end')) ?> ><?php echo $program['date_end']; ?></td>
			<td data-th=<?= ucfirst(__('time_begin')) ?> ><?php echo $program['time_begin']; ?></td>
			<td data-th=<?= ucfirst(__('time_end')) ?> ><?php echo $program['time_end']; ?></td>
			<td data-th=<?= ucfirst(__('min_presence')) ?> ><?php echo $program['min_presence']; ?></td>
			<td data-th=<?= ucfirst(__('file')) ?> ><?php echo $program['file']; ?></td>
			<td data-th=<?= ucfirst(__('file_dir')) ?> ><?php echo $program['file_dir']; ?></td>
			<td data-th=<?= ucfirst(__('certify')) ?> ><?php echo $program['certify']; ?></td>
			<td data-th=<?= ucfirst(__('certify_speakers')) ?> ><?php echo $program['certify_speakers']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $program['description']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $program['created']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $program['updated']; ?></td>
			<td data-th=<?= ucfirst(__('holdding_count')) ?> ><?php echo $program['holdding_count']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'programs', 
						'action' => 'view', 
						$program['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'programs', 
						'action' => 'edit', 
						$program['id']
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


	
		
<?php if (!empty($event['Sponsorship'])): ?>

		<h3>
			<a href="#" id="viewtable" >
				<?php echo __('Sponsorships'); ?>			</a>
		</h3>
		
	<div class="tabela" >
	<table id="tableid2" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('website'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('file_dir'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('updated'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($event['Sponsorship'] as $sponsorship): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $sponsorship['id']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $sponsorship['name']; ?></td>
			<td data-th=<?= ucfirst(__('website')) ?> ><?php echo $sponsorship['website']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $sponsorship['description']; ?></td>
			<td data-th=<?= ucfirst(__('file')) ?> ><?php echo $sponsorship['file']; ?></td>
			<td data-th=<?= ucfirst(__('file_dir')) ?> ><?php echo $sponsorship['file_dir']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $sponsorship['created']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $sponsorship['updated']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'sponsorships', 
						'action' => 'view', 
						$sponsorship['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'sponsorships', 
						'action' => 'edit', 
						$sponsorship['id']
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
