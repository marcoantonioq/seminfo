
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('document'),
				array('controller' => 'documents', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus" class="row-fluid">
		    <h3>Menu</h3>
			    <?php echo $this->Html->link('Novo '.__('document'),
						array('controller' => 'documents', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Programs'),
						array('controller' => 'programs', 'action' => 'index'),
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
						echo $this->Paginator->sort('program_id', ucfirst(__('program_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('title', ucfirst(__('title'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('author', ucfirst(__('author'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('institution', ucfirst(__('institution'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('email', ucfirst(__('email'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('course', ucfirst(__('course'))); 
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
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>					
				</td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('program_id'); ?>
									
					<?php echo $this->Filter->conditions('title'); ?>
									
					<?php echo $this->Filter->conditions('author'); ?>
									
					<?php echo $this->Filter->conditions('institution'); ?>
									
					<?php echo $this->Filter->conditions('email'); ?>
									
					<?php echo $this->Filter->conditions('course'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($documents as $document): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$document['Document']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($document['Document']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('program_id'));?>" >
			<?php echo $this->Html->link($document['Program']['name'], array('controller' => 'programs', 'action' => 'view', $document['Program']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('title'));?>" >
			<?php echo h($document['Document']['title']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('author'));?>" >
			<?php echo h($document['Document']['author']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('institution'));?>" >
			<?php echo h($document['Document']['institution']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('email'));?>" >
			<?php echo h($document['Document']['email']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('course'));?>" >
			<?php echo h($document['Document']['course']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($document['Document']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($document['Document']['file_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($document['Document']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($document['Document']['created']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$document['Document']['id']
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
						$document['Document']['id']
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
