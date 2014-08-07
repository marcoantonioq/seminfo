
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('program'),
				array('controller' => 'programs', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
    </div>
</div>


<div id="rowmenus" class="row-fluid">
	<div class="span12">
		<div class="actions well">
		    <h3>Menu</h3>
			    <?php echo $this->Html->link('Novo '.__('program'),
						array('controller' => 'programs', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Events'),
						array('controller' => 'events', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link(__('Typeprograms'),
						array('controller' => 'typeprograms', 'action' => 'index'),
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
					echo $this->Html->link(__('Speakers'),
						array('controller' => 'speakers', 'action' => 'index'),
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
						echo $this->Paginator->sort('event_id', ucfirst(__('event_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('typeprogram_id', ucfirst(__('typeprogram_id'))); 
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
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('price', ucfirst(__('price'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('vagas', ucfirst(__('vagas'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('reservations', ucfirst(__('reservations'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('duration', ucfirst(__('duration'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('content', ucfirst(__('content'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('date_begin', ucfirst(__('date_begin'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('date_end', ucfirst(__('date_end'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('time_begin', ucfirst(__('time_begin'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('time_end', ucfirst(__('time_end'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('min_presence', ucfirst(__('min_presence'))); 
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
						echo $this->Paginator->sort('certify', ucfirst(__('certify'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('certify_speakers', ucfirst(__('certify_speakers'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('holdding_count', ucfirst(__('holdding_count'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('event_id'); ?>
									
					<?php echo $this->Filter->conditions('typeprogram_id'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('local'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('price'); ?>
									
					<?php echo $this->Filter->conditions('vagas'); ?>
									
					<?php echo $this->Filter->conditions('reservations'); ?>
									
					<?php echo $this->Filter->conditions('duration'); ?>
									
					<?php echo $this->Filter->conditions('content'); ?>
									
					<?php echo $this->Filter->conditions('date_begin'); ?>
									
					<?php echo $this->Filter->conditions('date_end'); ?>
									
					<?php echo $this->Filter->conditions('time_begin'); ?>
									
					<?php echo $this->Filter->conditions('time_end'); ?>
									
					<?php echo $this->Filter->conditions('min_presence'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
									
					<?php echo $this->Filter->conditions('certify'); ?>
									
					<?php echo $this->Filter->conditions('certify_speakers'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('holdding_count'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($programs as $program): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$program['Program']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($program['Program']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('event_id'));?>" >
			<?php echo $this->Html->link($program['Event']['name'], array('controller' => 'events', 'action' => 'view', $program['Event']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('typeprogram_id'));?>" >
			<?php echo $this->Html->link($program['Typeprogram']['title'], array('controller' => 'typeprograms', 'action' => 'view', $program['Typeprogram']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($program['Program']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('local'));?>" >
			<?php echo h($program['Program']['local']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('status'));?>" >
			<?php echo h($program['Program']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('price'));?>" >
			<?php echo h($program['Program']['price']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('vagas'));?>" >
			<?php echo h($program['Program']['vagas']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('reservations'));?>" >
			<?php echo h($program['Program']['reservations']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('duration'));?>" >
			<?php echo h($program['Program']['duration']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('content'));?>" >
			<?php echo h($program['Program']['content']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('date_begin'));?>" >
			<?php echo h($program['Program']['date_begin']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('date_end'));?>" >
			<?php echo h($program['Program']['date_end']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('time_begin'));?>" >
			<?php echo h($program['Program']['time_begin']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('time_end'));?>" >
			<?php echo h($program['Program']['time_end']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('min_presence'));?>" >
			<?php echo h($program['Program']['min_presence']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($program['Program']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($program['Program']['file_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('certify'));?>" >
			<?php echo h($program['Program']['certify']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('certify_speakers'));?>" >
			<?php echo h($program['Program']['certify_speakers']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($program['Program']['description']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($program['Program']['created']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($program['Program']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('holdding_count'));?>" >
			<?php echo h($program['Program']['holdding_count']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$program['Program']['id']
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
						$program['Program']['id']
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
