<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt>
                <?php echo ucfirst(__('id')); ?>
            </dt>
            <dd>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Group')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Course')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Course']['name'], array('controller' => 'courses', 'action' => 'view', $user['Course']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('matricula')); ?></dt>
            <dd>
                <?php echo h($user['User']['matricula']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($user['User']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('sexo')); ?></dt>
            <dd>
                <?php echo h($user['User']['sexo']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('username')); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('password')); ?></dt>
            <dd>
                <?php echo h($user['User']['password']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('cpf')); ?></dt>
            <dd>
                <?php echo h($user['User']['cpf']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('phone')); ?></dt>
            <dd>
                <?php echo h($user['User']['phone']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($user['User']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('website')); ?></dt>
            <dd>
                <?php echo h($user['User']['website']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image')); ?></dt>
            <dd>
                <?php echo h($user['User']['image']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image_dir')); ?></dt>
            <dd>
                <?php echo h($user['User']['image_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('holding_count')); ?></dt>
            <dd>
                <?php echo h($user['User']['holding_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($user['User']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($user['User']['created']); ?>
                &nbsp;
            </dd>
            <dt>Código de barra</dt>
            <dd>
                <canvas class="barcode" value="<?=str_pad($user['User']['id'], 13, '0', STR_PAD_LEFT);?>" width="200" height="100">

                </canvas>
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

			<?php echo $this->Html->link('Novo '.__('user'),
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
		
<?php if (!empty($user['Holding'])): ?>

		<h3>
			<a href="#" id="viewtable" >
				<?php echo __('Holdings'); ?>			</a>
		</h3>
		
	<div class="tabela" >
	<table id="tableid3" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
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
		<?php foreach ($user['Holding'] as $holding): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $holding['id']; ?></td>
			<td data-th=<?= ucfirst(__('program_id')) ?> ><?php echo $programas[$holding['program_id']]; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $holding['status']; ?></td>
			<td data-th=<?= ucfirst(__('certificado')) ?> >
				<?php echo $this->Link->status($holding['id'], 'certificado', $holding['certificado']); ?>
				<?php 
					echo $this->Html->link('<span class="icon12  icomoon-icon-pencil-2"></span>', 
						array(
							'action' => 'certificados', 
							$holding['id']
						),
						array(
							'target'=>'_blank',
							'escape'=>false,
							'class'=>'certificado',
							'title'=>'Certificado',
						)
					); 
				?>
			</td>
			<td data-th=<?= ucfirst(__('credenciado')) ?> >
				<?php echo $this->Link->status($holding['id'],  'credenciado', $holding['credenciado']); ?>
			</td>
			<td data-th=<?= ucfirst(__('reservas')) ?> >
				<?php echo $this->Link->status($holding['id'],  'reservas', $holding['reservas']); ?>
			</td>
			<td data-th=<?= ucfirst(__('presenca')) ?> >
				<?php 
					echo $this->Html->link($holding['presenca']+"&nbsp;",
						array(
							'controller'=>'holdings', 
							'action'=>'presence',
							$holding['id'],
							'sum'
						),
						array(
							'class'=>"sendAjax presence green btn bold",
							'value'=>$holding['id'],
							'date' => $holding['date_presenca']
						)
					); 
				?>
				&nbsp;
			</td>
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

</div>
