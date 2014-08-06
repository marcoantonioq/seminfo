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
						echo $this->Paginator->sort('certificado', ucfirst(__('certificado'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('program_id', ucfirst(__('program_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('speaker_id', ucfirst(__('speaker_id'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td></td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('certificado'); ?>
									
					<?php echo $this->Filter->conditions('program_id'); ?>
									
					<?php echo $this->Filter->conditions('speaker_id'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($programsSpeakers as $programsSpeaker): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$programsSpeaker['ProgramsSpeaker']['id'], array( 'class'=>'styled' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($programsSpeaker['ProgramsSpeaker']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('certificado'));?>" >
			<?php echo h($programsSpeaker['ProgramsSpeaker']['certificado']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('program_id'));?>" >
			<?php echo $this->Html->link($programsSpeaker['Program']['name'], array('controller' => 'programs', 'action' => 'view', $programsSpeaker['Program']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('speaker_id'));?>" >
			<?php echo $this->Html->link($programsSpeaker['Speaker']['name'], array('controller' => 'speakers', 'action' => 'view', $programsSpeaker['Speaker']['id'])); ?>
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link(__('v'), 
					array(
						'action' => 'view', 
						$programsSpeaker['ProgramsSpeaker']['id']
					),
					array(
						'class'=>'view',
					)
				); ?>				
				
				<?php 
				echo $this->Html->link(__('e'), 
					array(
						'action' => 'edit', 
						$programsSpeaker['ProgramsSpeaker']['id']
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
			    <?php echo $this->Html->link('Novo '.__('programsSpeaker'),
						array('controller' => 'programsSpeakers', 'action' => 'add'),
						array('class'=> 'btn btn-block')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Programs'),
						array('controller' => 'programs', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link(__('Speakers'),
						array('controller' => 'speakers', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>
			
		</div>
	</dib>
</div>