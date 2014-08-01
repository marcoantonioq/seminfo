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
		<table class='responsive table table-bordered' id='checkAll'>
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
						echo $this->Paginator->sort('parent_id', ucfirst(__('parent_id'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('menu_id', ucfirst(__('menu_id'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('title', ucfirst(__('title'))); 
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
						echo $this->Paginator->sort('link', ucfirst(__('link'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('target', ucfirst(__('target'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('rel', ucfirst(__('rel'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('lft', ucfirst(__('lft'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('rght', ucfirst(__('rght'))); 
					?>				
				</th>
								
				<th>
					<?php 
						echo $this->Paginator->sort('visibility_roles', ucfirst(__('visibility_roles'))); 
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
									
					<?php echo $this->Filter->conditions('parent_id'); ?>
									
					<?php echo $this->Filter->conditions('menu_id'); ?>
									
					<?php echo $this->Filter->conditions('title'); ?>
									
					<?php echo $this->Filter->conditions('class'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('link'); ?>
									
					<?php echo $this->Filter->conditions('target'); ?>
									
					<?php echo $this->Filter->conditions('rel'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('lft'); ?>
									
					<?php echo $this->Filter->conditions('rght'); ?>
									
					<?php echo $this->Filter->conditions('visibility_roles'); ?>
									
					<?php echo $this->Filter->conditions('params'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<th>

				</th>
			</tr>
		</thead>

		<?php foreach ($links as $link): ?>
	<tr>

		<td class="chChildren">
			<?php echo $this->Form->checkbox('row.'.$link['Link']['id'], array( 'class'=>'styled' ));?>
		</td>
		<td><?php echo h($link['Link']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($link['ParentLink']['id'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($link['Menu']['id'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
		</td>
		<td><?php echo h($link['Link']['title']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['class']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['description']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['link']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['target']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['rel']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['status']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['lft']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['rght']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['visibility_roles']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['params']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['updated']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['created']); ?>&nbsp;</td>

			<td class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array('action' => 'view', 
					$link['Link']['id']
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array('action' => 'edit', 
					$link['Link']['id']
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
					echo $this->Html->link('Links',
						array('controller' => 'links', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link('Menus',
						array('controller' => 'menus', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


<?php $this->end(); ?>			
		</div>
	</dib>
</div>