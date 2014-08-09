<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('website')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['website']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($sponsorship['Sponsorship']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('sponsorship'),
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
		
		
<?php if (!empty($sponsorship['Event'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Event')); return false;">
				<?php echo __('Events'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Event" style="display: none;">
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('local'); ?></th>
		<th><?php echo __('published'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('first'); ?></th>
		<th><?php echo __('last'); ?></th>
		<th><?php echo __('realization'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('organization'); ?></th>
		<th><?php echo __('president'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('file_dir'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($sponsorship['Event'] as $event): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $event['id']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $event['name']; ?></td>
			<td data-th=<?= ucfirst(__('local')) ?> ><?php echo $event['local']; ?></td>
			<td data-th=<?= ucfirst(__('published')) ?> ><?php echo $event['published']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $event['status']; ?></td>
			<td data-th=<?= ucfirst(__('first')) ?> ><?php echo $event['first']; ?></td>
			<td data-th=<?= ucfirst(__('last')) ?> ><?php echo $event['last']; ?></td>
			<td data-th=<?= ucfirst(__('realization')) ?> ><?php echo $event['realization']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $event['description']; ?></td>
			<td data-th=<?= ucfirst(__('organization')) ?> ><?php echo $event['organization']; ?></td>
			<td data-th=<?= ucfirst(__('president')) ?> ><?php echo $event['president']; ?></td>
			<td data-th=<?= ucfirst(__('file')) ?> ><?php echo $event['file']; ?></td>
			<td data-th=<?= ucfirst(__('file_dir')) ?> ><?php echo $event['file_dir']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'events', 
						'action' => 'view', 
						$event['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'events', 
						'action' => 'edit', 
						$event['id']
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
