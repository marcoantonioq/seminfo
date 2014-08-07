<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($group['Group']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($group['Group']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($group['Group']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($group['Group']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('modified')); ?></dt>
            <dd>
                <?php echo h($group['Group']['modified']); ?>
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

			<?php echo $this->Html->link('Novo '.__('group'),
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
		
		
<?php if (!empty($group['User'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('User')); return false;">
				<?php echo __('Users'); ?>			</a>
		</h3>
		
	<div class="tabela " id="User" style="display: none;">
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('group_id'); ?></th>
		<th><?php echo __('course_id'); ?></th>
		<th><?php echo __('matricula'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('sexo'); ?></th>
		<th><?php echo __('username'); ?></th>
		<th><?php echo __('password'); ?></th>
		<th><?php echo __('email'); ?></th>
		<th><?php echo __('cpf'); ?></th>
		<th><?php echo __('phone'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('website'); ?></th>
		<th><?php echo __('image'); ?></th>
		<th><?php echo __('image_dir'); ?></th>
		<th><?php echo __('holding_count'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('courses_id'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $user['id']; ?></td>
			<td data-th=<?= ucfirst(__('group_id')) ?> ><?php echo $user['group_id']; ?></td>
			<td data-th=<?= ucfirst(__('course_id')) ?> ><?php echo $user['course_id']; ?></td>
			<td data-th=<?= ucfirst(__('matricula')) ?> ><?php echo $user['matricula']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $user['name']; ?></td>
			<td data-th=<?= ucfirst(__('sexo')) ?> ><?php echo $user['sexo']; ?></td>
			<td data-th=<?= ucfirst(__('username')) ?> ><?php echo $user['username']; ?></td>
			<td data-th=<?= ucfirst(__('password')) ?> ><?php echo $user['password']; ?></td>
			<td data-th=<?= ucfirst(__('email')) ?> ><?php echo $user['email']; ?></td>
			<td data-th=<?= ucfirst(__('cpf')) ?> ><?php echo $user['cpf']; ?></td>
			<td data-th=<?= ucfirst(__('phone')) ?> ><?php echo $user['phone']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $user['status']; ?></td>
			<td data-th=<?= ucfirst(__('website')) ?> ><?php echo $user['website']; ?></td>
			<td data-th=<?= ucfirst(__('image')) ?> ><?php echo $user['image']; ?></td>
			<td data-th=<?= ucfirst(__('image_dir')) ?> ><?php echo $user['image_dir']; ?></td>
			<td data-th=<?= ucfirst(__('holding_count')) ?> ><?php echo $user['holding_count']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $user['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $user['created']; ?></td>
			<td data-th=<?= ucfirst(__('courses_id')) ?> ><?php echo $user['courses_id']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'users', 
						'action' => 'view', 
						$user['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'users', 
						'action' => 'edit', 
						$user['id']
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
