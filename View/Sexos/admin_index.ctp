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
		<table class='rwd-table'>
		<thead>
			<tr>
				<th class='ch'>
					<?php $this->Filter->img(); ?>
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('nome', ucfirst(__('nome'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('user_count', ucfirst(__('user_count'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter" style="display:none;">
				<td  class='invisible' data-th='Filtro'></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('nome'); ?>
									
					<?php echo $this->Filter->conditions('user_count'); ?>
								
				<td class='invisible'>

				</td>
			</tr>
		</thead>

		<?php foreach ($sexos as $sexo): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$sexo['Sexo']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= __('id');?>" >
			<?php echo h($sexo['Sexo']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('nome');?>" >
			<?php echo h($sexo['Sexo']['nome']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('user_count');?>" >
			<?php echo h($sexo['Sexo']['user_count']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array('action' => 'view', 
					$sexo['Sexo']['id']
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array('action' => 'edit', 
					$sexo['Sexo']['id']
					)
				); ?>			</td>

	
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
            'default'=>10,
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
	<?php echo $this->element('pagination'); ?>
	</div>

	<dib class="span4">
		<div class="actions well">
		    <h3>Menu</h3>
		    

					<?php 
					echo $this->Html->link('Users',
						array('controller' => 'users', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


<?php $this->end(); ?>			
		</div>
	</dib>
</div>