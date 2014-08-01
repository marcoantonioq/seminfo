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
		<table class='responsive table table-bordered' id='checkAll'>
		<thead>
			<tr>
				<th class='ch'>
					<?php $this->Filter->img(); ?>				</th>
								
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
								
				<th>
					<?php 
						echo $this->Paginator->sort('class', ucfirst(__('class'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('weight', ucfirst(__('weight'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('link_count', ucfirst(__('link_count'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('params', ucfirst(__('params'))); 
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
			<tr id="filter" style="display:none;">
				<th></th>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('title'); ?>
									
					<?php echo $this->Filter->conditions('alias'); ?>
									
					<?php echo $this->Filter->conditions('class'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('weight'); ?>
									
					<?php echo $this->Filter->conditions('link_count'); ?>
									
					<?php echo $this->Filter->conditions('params'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<th>

				</th>
			</tr>
		</thead>

		<?php foreach ($menus as $menu): ?>
	<tr>

		<td class="chChildren">
			<?php echo $this->Form->checkbox('row.'.$menu['Menu']['id'], array( 'class'=>'styled' ));?>
		</td>
		<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['title']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['alias']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['class']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['description']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['status']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['weight']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['link_count']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['params']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created']); ?>&nbsp;</td>

			<td class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array('action' => 'view', 
					$menu['Menu']['id']
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array('action' => 'edit', 
					$menu['Menu']['id']
					)
				); ?>			</td>

	
	</tr>

	<?php endforeach; ?>
	</table>

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
					echo $this->Html->link('Links',
						array('controller' => 'links', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


<?php $this->end(); ?>			
		</div>
	</dib>
</div>