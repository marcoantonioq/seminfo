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
						echo $this->Paginator->sort('title', ucfirst(__('title'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('alias', ucfirst(__('alias'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('title'); ?>
									
					<?php echo $this->Filter->conditions('alias'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($typeprograms as $typeprogram): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$typeprogram['Typeprogram']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($typeprogram['Typeprogram']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('title'));?>" >
			<?php echo h($typeprogram['Typeprogram']['title']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('alias'));?>" >
			<?php echo h($typeprogram['Typeprogram']['alias']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array(
						'action' => 'view', 
						$typeprogram['Typeprogram']['id']
					),
					array(
						'class'=>'view',
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array(
						'action' => 'edit', 
						$typeprogram['Typeprogram']['id']
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
			    <?php echo $this->Html->link('Novo '.__('typeprogram'),
						array('controller' => 'typeprograms', 'action' => 'add'),
						array('class'=> 'btn btn-block')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link('Programs',
						array('controller' => 'programs', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>
			
		</div>
	</dib>
</div>