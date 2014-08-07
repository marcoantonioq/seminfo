
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('speaker'),
				array('controller' => 'speakers', 'action' => 'add'),
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
			    <?php echo $this->Html->link('Novo '.__('speaker'),
						array('controller' => 'speakers', 'action' => 'add'),
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
						echo $this->Paginator->sort('institution', ucfirst(__('institution'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('phone', ucfirst(__('phone'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('email', ucfirst(__('email'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('twitter', ucfirst(__('twitter'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('facebook', ucfirst(__('facebook'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('blog', ucfirst(__('blog'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('linkedin', ucfirst(__('linkedin'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('lattes', ucfirst(__('lattes'))); 
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
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
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
									
					<?php echo $this->Filter->conditions('institution'); ?>
									
					<?php echo $this->Filter->conditions('phone'); ?>
									
					<?php echo $this->Filter->conditions('email'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('twitter'); ?>
									
					<?php echo $this->Filter->conditions('facebook'); ?>
									
					<?php echo $this->Filter->conditions('blog'); ?>
									
					<?php echo $this->Filter->conditions('linkedin'); ?>
									
					<?php echo $this->Filter->conditions('lattes'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($speakers as $speaker): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$speaker['Speaker']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($speaker['Speaker']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($speaker['Speaker']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('institution'));?>" >
			<?php echo h($speaker['Speaker']['institution']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('phone'));?>" >
			<?php echo h($speaker['Speaker']['phone']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('email'));?>" >
			<?php echo h($speaker['Speaker']['email']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($speaker['Speaker']['description']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('twitter'));?>" >
			<?php echo h($speaker['Speaker']['twitter']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('facebook'));?>" >
			<?php echo h($speaker['Speaker']['facebook']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('blog'));?>" >
			<?php echo h($speaker['Speaker']['blog']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('linkedin'));?>" >
			<?php echo h($speaker['Speaker']['linkedin']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('lattes'));?>" >
			<?php echo h($speaker['Speaker']['lattes']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($speaker['Speaker']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($speaker['Speaker']['file_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($speaker['Speaker']['created']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($speaker['Speaker']['updated']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$speaker['Speaker']['id']
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
						$speaker['Speaker']['id']
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
