
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('usersMessage'),
				array('controller' => 'usersMessages', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
		    <h3>Menu</h3>
			    <?php echo $this->Html->link('Novo '.__('usersMessage'),
						array('controller' => 'usersMessages', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Users'),
						array('controller' => 'users', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link(__('Messages'),
						array('controller' => 'messages', 'action' => 'index'),
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
						echo $this->Paginator->sort('user_id', ucfirst(__('user_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('message_id', ucfirst(__('message_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('read', ucfirst(__('read'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('user_id'); ?>
									
					<?php echo $this->Filter->conditions('message_id'); ?>
									
					<?php echo $this->Filter->conditions('read'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($usersMessages as $usersMessage): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$usersMessage['UsersMessage']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($usersMessage['UsersMessage']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('user_id'));?>" >
			<?php echo $this->Html->link($usersMessage['User']['name'], array('controller' => 'users', 'action' => 'view', $usersMessage['User']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('message_id'));?>" >
			<?php echo $this->Html->link($usersMessage['Message']['title'], array('controller' => 'messages', 'action' => 'view', $usersMessage['Message']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('read'));?>" >
			<?php echo h($usersMessage['UsersMessage']['read']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$usersMessage['UsersMessage']['id']
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
						$usersMessage['UsersMessage']['id']
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
