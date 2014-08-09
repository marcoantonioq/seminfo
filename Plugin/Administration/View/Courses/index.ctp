
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('course'),
				array('controller' => 'courses', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
			    <?php echo $this->Html->link('Novo '.__('course'),
						array('controller' => 'courses', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Users'),
						array('controller' => 'users', 'action' => 'index'),
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
		<table id="tableid1" class='rwd-table'>
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
						echo $this->Paginator->sort('name', ucfirst(__('name'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('body', ucfirst(__('body'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('file', ucfirst(__('file'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('file_dir', ucfirst(__('file_dir'))); 
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
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('body'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($courses as $course): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$course['Course']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($course['Course']['description']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('body'));?>" >
			<?php echo h($course['Course']['body']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($course['Course']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($course['Course']['file_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($course['Course']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$course['Course']['id']
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
						$course['Course']['id']
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

	<?php echo $this->Form->end(); ?>
	<?php echo $this->element('layout/pagination'); ?>
	</div>
</div>
