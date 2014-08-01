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

<table class="rwd-table">
	<thead>
		<tr>
			<th><a href="#">Movie Title</a></th>
			<th>Genre</th>
			<th>Year</th>
			<th>Gross</th>
		</tr>
		<tr id="filter" style="display:none;">
			<?php echo $this->Filter->conditions('id'); ?>
			<?php echo $this->Filter->conditions('id'); ?>
			<?php echo $this->Filter->conditions('id'); ?>
			<?php echo $this->Filter->conditions('id'); ?>
		</tr>
	</thead>
	  <tr>
	    <td data-th="Movie Title">Star Wars</td>
	    <td data-th="Genre">Adventure, Sci-fi</td>
	    <td data-th="Year">1977</td>
	    <td data-th="Gross">$460,935,665</td>
	  </tr>
	  <tr>
	    <td data-th="Movie Title">Howard The Duck</td>
	    <td data-th="Genre">"Comedy"</td>
	    <td data-th="Year">1986</td>
	    <td data-th="Gross">$16,295,774</td>
	  </tr>
	  <tr>
	    <td data-th="Movie Title">American Graffiti</td>
	    <td data-th="Genre">Comedy, Drama</td>
	    <td data-th="Year">1973</td>
	    <td data-th="Gross">$115,000,000</td>
	  </tr>
</table>

	 
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
						echo $this->Paginator->sort('local', ucfirst(__('local'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('publicado', ucfirst(__('publicado'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('inicio', ucfirst(__('inicio'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('termino', ucfirst(__('termino'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('realizacao', ucfirst(__('realizacao'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('descricao', ucfirst(__('descricao'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('organizacao', ucfirst(__('organizacao'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('holding_count', ucfirst(__('holding_count'))); 
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
			<tr id="filter" style="display:none;">
				<th></th>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('nome'); ?>
									
					<?php echo $this->Filter->conditions('local'); ?>
									
					<?php echo $this->Filter->conditions('publicado'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('inicio'); ?>
									
					<?php echo $this->Filter->conditions('termino'); ?>
									
					<?php echo $this->Filter->conditions('realizacao'); ?>
									
					<?php echo $this->Filter->conditions('descricao'); ?>
									
					<?php echo $this->Filter->conditions('organizacao'); ?>
									
					<?php echo $this->Filter->conditions('holding_count'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
								
				<th>

				</th>
			</tr>
		</thead>

		<?php foreach ($events as $event): ?>
	<tr>

		<td class="chChildren">
			<?php echo $this->Form->checkbox('row.'.$event['Event']['id'], array( 'class'=>'styled' ));?>
		</td>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['nome']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['local']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['publicado']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['status']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['inicio']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['termino']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['realizacao']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['organizacao']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['holding_count']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['file']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['file_dir']); ?>&nbsp;</td>

			<td class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array('action' => 'view', 
					$event['Event']['id']
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array('action' => 'edit', 
					$event['Event']['id']
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
					echo $this->Html->link('Holdings',
						array('controller' => 'holdings', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link('Programas',
						array('controller' => 'programas', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


<?php $this->end(); ?>			
		</div>
	</dib>
</div>