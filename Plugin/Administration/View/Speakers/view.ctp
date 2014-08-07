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
		
		
<?php if (!empty($speaker['Program'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Program')); return false;">
				<?php echo __('Programs'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Program" style="display: none;">
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
		<?php foreach ($speaker['Program'] as $program): ?>
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


		

</div>
