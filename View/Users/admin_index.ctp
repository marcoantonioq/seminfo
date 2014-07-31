<div class="row-fluid">
	<div class="span8">		
		<?php 
			echo $this->Form->create('Filter');
			
			$this->Form->inputDefaults(array(
				'label'=>false,
				'div'=>false,
				'class'=>'span4',
				'autocomplete'=>'off',
				'onfocus'=>"this.select();",
			));

			echo $this->Form->input('search', array(
				'autofocus' => true,
				'onkeydown'=>'bloquearCtrlJ();',
				'placeholder' => 'Buscar...',
			));

			echo  $this->Form->button('Buscar', array(
				'class'=>'btn',
				'style'=>'margin-bottom: 10px;'
			));
		 ?>

		<table class='responsive table table-bordered' id='checkAll'>
		<tr>
				<th></th>
				<th>
					<?php echo $this->Form->checkbox('Columns.id', array('checked' => true)); ?>
					<?php echo $this->Paginator->sort('id', __('id')); ?>
				</th>
				<th>
					<?php echo $this->Form->checkbox('Columns.group_id', array('checked' => false)); ?>
					<?php echo $this->Paginator->sort('group_id', __('group_id')); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('name', __('name')); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('status', __('status')); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('usersprograma_count', __('Participações')); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('created', __('created')); ?>
				</th>
				<th class="actions"><?php echo __('Ações'); ?></th>
		</tr>
		<?php foreach ($users as $user): ?>
		<tr>
			<td>
				<?php echo $this->Form->checkbox('User.'.$user['User']['id']. '.check', array('checked' => false)); ?>
			</td>
			<td>
				<?= $user['User']['id']; ?>
			</td>
			<td>
				<?php 
				echo $this->Html->link(
					$user['Group']['name'], 
					array(
						'controller' => 'groups', 
						'action' => 'view', 
						$user['Group']['id']
					)
				);
				?>
			</td>
			<td>
				<?php 
				echo $this->Html->link(
				$user['User']['name'], 
					array(
						'controller' => 'users', 
						'action' => 'view',
						$user['User']['id']
					)
				); 
				?>&nbsp;
			</td>
			<td>
				<?php echo h($user['User']['status']); ?>&nbsp;
			</td>
			<td>
				<?php echo h($user['User']['usersprograma_count']); ?>&nbsp;
			</td>
			<td>
				<?= date('d/m/Y H:i:s', strtotime($user['User']['created'])); ?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('v'), array('action' => 'view', $user['User']['id'])); ?>
				<?php echo $this->Html->link(__('e'), array('action' => 'edit', $user['User']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
		<?php echo $this->Form->end('Imprimir'); ?>
		
		<?php echo $this->element('pagination'); ?>
	</div>


	<dib class="span4">
		<div class="actions well">
		    <h3>Menu</h3>
		    <?php echo $this->Html->link(__('Novo'), array('action' => 'add'), array("class"=>"btn btn-block")); ?>
			<?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index'), array("class"=>"btn btn-block")); ?> 
			<?php echo $this->Html->link(__('Sexo'), array('controller' => 'sexos', 'action' => 'add'), array("class"=>"btn btn-block")); ?> 
		</div>
	</dib>
</div>