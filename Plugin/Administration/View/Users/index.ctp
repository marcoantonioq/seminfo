
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('user'),
				array('controller' => 'users', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
				<?php echo $this->Html->link('Novo '.__('user'),
						array('controller' => 'users', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
				?> 

				<?php 
				echo $this->Html->link(__('Contacts'),
					array('controller' => 'contacts', 'action' => 'index'),
					array('class'=> 'btn btn-block')
				);
				?>

				<?php 
				echo $this->Html->link(__('Holdings'),
					array('controller' => 'holdings', 'action' => 'index'),
					array('class'=> 'btn btn-block')
				);
				?>



				<?php 
				echo $this->Html->link(__('Groups'),
					array('controller' => 'groups', 'action' => 'index'),
					array('class'=> 'btn btn-block')
				);
				?>

		</div>
    </div>
</div>



<div class="row-fluid">
	<div class="span12">		

	<?php 
			echo $this->Form->create('Filter');
			
			$this->Form->inputDefaults(array(
				'label'=>false,
				'div'=>false,
				'class'=>'span6',
				'autocomplete'=>'off',
				'onfocus'=>'this.select();',
			));

			$options = array(
                '=' => 'igual',
                'LIKE' => 'contenha',
                'NOT LIKE' => 'não contenha',
                'LIKE BEGIN' => 'começando com',
                'LIKE END' => 'terminando com',
                '!=' => 'diferente',
                '>'  => 'maior do que',
                '>=' => 'maior ou igual a',
                '<'  => 'menor que',
                '<=' => 'menor ou igual a'
            );
			
	 ?>
	<div class="tabela">
		<table class='rwd-table'>
		<thead>
			<tr>
				<th>
					<?php $this->Filter->img(); ?>
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('group_id', ucfirst(__('group_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('course_id', ucfirst(__('course_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('matricula', ucfirst(__('matricula'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('name', ucfirst(__('name'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('sexo', ucfirst(__('sexo'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('username', ucfirst(__('username'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('password', ucfirst(__('password'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('email', ucfirst(__('email'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('cpf', ucfirst(__('cpf'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('phone', ucfirst(__('phone'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('website', ucfirst(__('website'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('image', ucfirst(__('image'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('image_dir', ucfirst(__('image_dir'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('holding_count', ucfirst(__('holding_count'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
					?>				
				</th>
									
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>
				</td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('group_id'); ?>
									
					<?php echo $this->Filter->conditions('course_id'); ?>
									
					<?php echo $this->Filter->conditions('matricula'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('sexo'); ?>
									
					<?php echo $this->Filter->conditions('username'); ?>
									
					<?php echo $this->Filter->conditions('password'); ?>
									
					<?php echo $this->Filter->conditions('email'); ?>
									
					<?php echo $this->Filter->conditions('cpf'); ?>
									
					<?php echo $this->Filter->conditions('phone'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('website'); ?>
									
					<?php echo $this->Filter->conditions('image'); ?>
									
					<?php echo $this->Filter->conditions('image_dir'); ?>
									
					<?php echo $this->Filter->conditions('holding_count'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($users as $user): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$user['User']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('group_id'));?>" >
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('course_id'));?>" >
			<?php echo $this->Html->link($user['Course']['name'], array('controller' => 'courses', 'action' => 'view', $user['Course']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('matricula'));?>" >
			<?php echo h($user['User']['matricula']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('sexo'));?>" >
			<?php echo h($user['User']['sexo']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('username'));?>" >
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('password'));?>" >
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('email'));?>" >
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('cpf'));?>" >
			<?php echo h($user['User']['cpf']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('phone'));?>" >
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('status'));?>" >
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('website'));?>" >
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('image'));?>" >
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('image_dir'));?>" >
			<?php echo h($user['User']['image_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('holding_count'));?>" >
			<?php echo h($user['User']['holding_count']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$user['User']['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); ?>				
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'action' => 'edit', 
						$user['User']['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				); ?>
			</td>

	
	</tr>

	<?php endforeach; ?>
	</table>
	</div>

	<?php 	
        echo $this->Form->input('Pagination.limit', array(
            'label'=>"Limite",
            'type'=>'select',
            'options'=> array(
				'20'=>'20',
				'50'=>'50',
				'100'=>'100',
				'500'=>'500',
				'1000'=>'1000',
				'10000'=>'10000'
			),
            'default'=>20,
            "class"=>"span2",
            'onchange'=>'this.form.submit();'
        ));
    ?> 
    
	<?php 
		echo  $this->Form->button('Buscar', array(
		'class'=>'btn',
		'style'=>'margin-bottom: 10px;'
		)); 
	?> 

	<?php 
		echo  $this->Form->button('Etiquetas', array(
			'class'=>'btn',
			'style'=>'margin-bottom: 10px;',
			'formaction'=>'/seminfo/administration/users/labels',
		)); 
	?>


	<?php 
		echo  $this->Form->button('Credenciar', array(
			'class'=>'btn',
			'style'=>'margin-bottom: 10px;',
			'formaction'=>'/seminfo/administration/users/credenciar',
		)); 
	?>

	<?php echo $this->Form->end(); ?>
	<?php echo $this->element('layout/pagination'); ?>
	</div>
</div>
