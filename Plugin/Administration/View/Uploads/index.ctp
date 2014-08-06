<div class="row-fluid">
	<div class="span8">		

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
						echo $this->Paginator->sort('type', ucfirst(__('type'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('size', ucfirst(__('size'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('modified', ucfirst(__('modified'))); 
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
									
					<?php echo $this->Filter->conditions('type'); ?>
									
					<?php echo $this->Filter->conditions('size'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
									
					<?php echo $this->Filter->conditions('modified'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($uploads as $upload): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$upload['Upload']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($upload['Upload']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($upload['Upload']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('type'));?>" >
			<?php echo h($upload['Upload']['type']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('size'));?>" >
			<?php echo h($upload['Upload']['size']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($upload['Upload']['created']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('modified'));?>" >
			<?php echo h($upload['Upload']['modified']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array(
						'action' => 'view', 
						$upload['Upload']['id']
					),
					array(
						'class'=>'view',
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array(
						'action' => 'edit', 
						$upload['Upload']['id']
					),
					array(
						'class'=>'edit',
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

	<?php echo $this->Form->end('Imprimir'); ?>
	<?php echo $this->element('layout/pagination'); ?>
	</div>

	<dib class="span4">
		<div class="actions well">
		    <h3>Menu</h3>
			    <?php echo $this->Html->link('Novo '.__('upload'),
						array('controller' => 'uploads', 'action' => 'add'),
						array('class'=> 'btn btn-block')
					);
			    ?> 
		    			
		</div>
	</dib>
</div>