<div class="row-fluid">
	<div class="span8">		

	<?php 
			echo $this->Form->create('Filter');
			
			$this->Form->inputDefaults(array(
				'label'=>false,
				'div'=>false,
				'class'=>'span6 left',
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
				<th id='masterCh' class='ch'>
					
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
			<tr>
				<th></th>
				<th>
					<?php 
					echo $this->Form->input('conditions.id', array(
		                'options' => $options,
		            ));
					echo $this->Form->input('id', array(
						'autofocus' => true,
						'onkeydown'=>'bloquearCtrlJ();',
						'placeholder' => ucfirst(__('id')).'...',
					));
					 ?>
				</th>
				<th>
					<?php 
					echo $this->Form->input('conditions.nome', array(
		                'options' => $options,
		            ));
					echo $this->Form->input('nome', array(
						'onkeydown'=>'bloquearCtrlJ();',
						'placeholder' => ucfirst(__('nome')).'...',
					));
					 ?>
				</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<?php foreach ($sexos as $sexo): ?>
	<tr>

		<td class="chChildren">
			<?php echo $this->Form->checkbox('row.'.$sexo['Sexo']['id'], array( 'class'=>'styled' ));?>
		</td>
		<td><?php echo h($sexo['Sexo']['id']); ?>&nbsp;</td>
		<td><?php echo h($sexo['Sexo']['nome']); ?>&nbsp;</td>
		<td><?php echo h($sexo['Sexo']['user_count']); ?>&nbsp;</td>

			<td class="actions">
				
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
				); ?>				
				
				<?php 
				// echo $this->Form->postLink(__('d'), 
				//	array( 'action' => 'delete',
				//	$sexo['Sexo']['id']
				//	),
				//	null,
                //	__('Tem certeza de que deseja excluir?')
				//); 
				?>			</td>

	
	</tr>

	<?php endforeach; ?>
	</table>

	<?php 
        echo $this->Form->input('Pagination.limit', array(
            'label'=>"Limite",
            'type'=>'select',
            'options'=> array('20'=>'20','50'=>'50','100'=>'100','500'=>'500','1000'=>'1000','10000'=>'10000'),
            'default'=>10,
            "class"=>"span2",
            'onchange'=>'this.form.submit();'
        ));
    ?>
	
	<?php 
		echo  $this->Form->button('Buscar', array(
		'class'=>'btn',
		'style'=>'margin-bottom: 10px;'
		)); ?>
	
	<?php 
		echo $this->Form->end('Imprimir'); 
	?>	
	
	<?php 
		echo $this->element('pagination'); 
	?>
	
	</div>

	<dib class="span4">
		<div class="actions well">
		    <h3>Menu</h3>
		    <?php echo $this->Html->link(__('Novo'), array('action' => 'add'), array('class'=>'btn btn-block')); ?>
		    <?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index'), array('class'=>'btn btn-block')); ?> 		    
		    <?php echo $this->Html->link(__('Sexo'), array('controller' => 'sexos', 'action' => 'add'), array('class'=>'btn btn-block')); ?>	
			
		</div>
	</dib>
</div>