
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('eventsSponsorship'),
				array('controller' => 'eventsSponsorships', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
			    <?php echo $this->Html->link('Novo '.__('eventsSponsorship'),
						array('controller' => 'eventsSponsorships', 'action' => 'add'),
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
						echo $this->Paginator->sort('event_id', ucfirst(__('event_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('sponsorship_id', ucfirst(__('sponsorship_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('event_id'); ?>
									
					<?php echo $this->Filter->conditions('sponsorship_id'); ?>
									
					<?php echo $this->Filter->conditions('id'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($eventsSponsorships as $eventsSponsorship): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$eventsSponsorship['EventsSponsorship']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('event_id'));?>" >
			<?php echo $this->Html->link($eventsSponsorship['Event']['name'], array('controller' => 'events', 'action' => 'view', $eventsSponsorship['Event']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('sponsorship_id'));?>" >
			<?php echo $this->Html->link($eventsSponsorship['Sponsorship']['name'], array('controller' => 'sponsorships', 'action' => 'view', $eventsSponsorship['Sponsorship']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($eventsSponsorship['EventsSponsorship']['id']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$eventsSponsorship['EventsSponsorship']['id']
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
						$eventsSponsorship['EventsSponsorship']['id']
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
