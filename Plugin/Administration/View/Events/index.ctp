
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('event'),
				array('controller' => 'events', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
			    <?php echo $this->Html->link('Novo '.__('event'),
						array('controller' => 'events', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Programs'),
						array('controller' => 'programs', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link(__('Sponsorships'),
						array('controller' => 'sponsorships', 'action' => 'index'),
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
						echo $this->Paginator->sort('local', ucfirst(__('local'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('published', ucfirst(__('published'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('first', ucfirst(__('first'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('last', ucfirst(__('last'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('realization', ucfirst(__('realization'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('organization', ucfirst(__('organization'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('president', ucfirst(__('president'))); 
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
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('local'); ?>
									
					<?php echo $this->Filter->conditions('published'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('first'); ?>
									
					<?php echo $this->Filter->conditions('last'); ?>
									
					<?php echo $this->Filter->conditions('realization'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('organization'); ?>
									
					<?php echo $this->Filter->conditions('president'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($events as $event): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$event['Event']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($event['Event']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('local'));?>" >
			<?php echo h($event['Event']['local']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('published'));?>" >
			<?php echo h($event['Event']['published']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('status'));?>" >
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('first'));?>" >
			<?php echo h($event['Event']['first']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('last'));?>" >
			<?php echo h($event['Event']['last']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('realization'));?>" >
			<?php echo h($event['Event']['realization']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($event['Event']['description']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('organization'));?>" >
			<?php echo h($event['Event']['organization']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('president'));?>" >
			<?php echo h($event['Event']['president']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($event['Event']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($event['Event']['file_dir']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$event['Event']['id']
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
						$event['Event']['id']
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
