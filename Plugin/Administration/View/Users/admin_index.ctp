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
						echo $this->Paginator->sort('group_id', ucfirst(__('group_id'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('curso_id', ucfirst(__('curso_id'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('matricula', ucfirst(__('matricula'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('name', ucfirst(__('name'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('sexo_id', ucfirst(__('sexo_id'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('username', ucfirst(__('username'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('password', ucfirst(__('password'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('email', ucfirst(__('email'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('cpf', ucfirst(__('cpf'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('telefone', ucfirst(__('telefone'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('website', ucfirst(__('website'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('image', ucfirst(__('image'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('image_dir', ucfirst(__('image_dir'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('message_count', ucfirst(__('message_count'))); 
					?>				
				</th>
								
				<th>
					
					<?php 
						echo $this->Paginator->sort('usersprograma_count', ucfirst(__('usersprograma_count'))); 
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
				<td  class='invisible' data-th='Filtro'></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('group_id'); ?>
									
					<?php echo $this->Filter->conditions('curso_id'); ?>
									
					<?php echo $this->Filter->conditions('matricula'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('sexo_id'); ?>
									
					<?php echo $this->Filter->conditions('username'); ?>
									
					<?php echo $this->Filter->conditions('password'); ?>
									
					<?php echo $this->Filter->conditions('email'); ?>
									
					<?php echo $this->Filter->conditions('cpf'); ?>
									
					<?php echo $this->Filter->conditions('telefone'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('website'); ?>
									
					<?php echo $this->Filter->conditions('image'); ?>
									
					<?php echo $this->Filter->conditions('image_dir'); ?>
									
					<?php echo $this->Filter->conditions('message_count'); ?>
									
					<?php echo $this->Filter->conditions('usersprograma_count'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<td class='invisible'>

				</td>
			</tr>
		</thead>

		<?php foreach ($users as $user): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$user['User']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= __('id');?>" >
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('group_id');?>" >
			<?php echo h($user['User']['group_id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('curso_id');?>" >
			<?php echo h($user['User']['curso_id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('matricula');?>" >
			<?php echo h($user['User']['matricula']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('name');?>" >
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('sexo_id');?>" >
			<?php echo h($user['User']['sexo_id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('username');?>" >
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('password');?>" >
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('email');?>" >
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('cpf');?>" >
			<?php echo h($user['User']['cpf']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('telefone');?>" >
			<?php echo h($user['User']['telefone']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('status');?>" >
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('website');?>" >
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('image');?>" >
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('image_dir');?>" >
			<?php echo h($user['User']['image_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('message_count');?>" >
			<?php echo h($user['User']['message_count']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('usersprograma_count');?>" >
			<?php echo h($user['User']['usersprograma_count']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('updated');?>" >
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= __('created');?>" >
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array('action' => 'view', 
					$user['User']['id']
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array('action' => 'edit', 
					$user['User']['id']
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
	<?php echo $this->element('layout/pagination'); ?>
	</div>

	<dib class="span4">
		<div class="actions well">
		    <h3>Menu</h3>
		    

<?php $this->end(); ?>			
		</div>
	</dib>
</div>