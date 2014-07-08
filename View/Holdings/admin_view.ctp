<div class="holdings view">
<h2><?php  echo __('Participação'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holding['Holding']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($holding['User']['name'], array('controller' => 'users', 'action' => 'view', $holding['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($holding['Event']['nome'], array('controller' => 'events', 'action' => 'view', $holding['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comissão'); ?></dt>
		<dd>
			<?php echo h($holding['Holding']['comissao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($holding['Holding']['description']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($holding['Holding']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($holding['Holding']['updated']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Participação'), array('action' => 'edit', $holding['Holding']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar Participação'), array('action' => 'delete', $holding['Holding']['id']), null, __('Tem certeza de que deseja excluir # %s?', $holding['Holding']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Participação'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Participação'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Programas'); ?></h3>
	<?php if (!empty($holding['Programa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Duração'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Certificado'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($holding['Programa'] as $programa): ?>
		<tr>
			<td><?php echo $programa['id']; ?></td>
			<td><?php echo $programa['nome']; ?></td>
			<td><?php echo $programa['duracao']; ?></td>
			<td><?php echo $programa['created']; ?></td>
			<td><?php echo $programa['updated']; ?></td>
			<td><?php echo $programa['status']; ?></td>
			<td class="actions">
				<?php
					if($programa['HoldingsPrograma']['certificado'] == 1){
						echo $this->Form->postlink(
							'<span>Print</span>', 
							array(
								'controller' => 'holdings', 
								'action' => 'certificados', 
								$holding['Holding']['id'], 
								$programa['id'].'.pdf'
							), 
							array(
							'target' => '_blank', 
							'escape' => FALSE,// "class" =>"link-button"
						));
						echo $this->Html->link(
							'Lock',
							array('controller' => 'holdings_programas', 'action' => 'certificado', $programa['HoldingsPrograma']['id'])
						);
					}else{
						echo $this->Html->link(
							'Liberar',
							array('controller' => 'holdings_programas', 'action' => 'certificado', $programa['HoldingsPrograma']['id'])
						);
					}

				?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'holdings_programas','action' => 'view',  $programa['HoldingsPrograma']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'holdings_programas', 'action' => 'edit',$programa['HoldingsPrograma']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'holdings_programas', 'action' => 'delete', $programa['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['HoldingsPrograma']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
