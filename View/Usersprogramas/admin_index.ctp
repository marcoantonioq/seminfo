<div class="usersprogramas index">
	<h2><?php echo __('Participação em programa'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('certificado'); ?></th>
			<th><?php echo $this->Paginator->sort('reservas'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($usersprogramas as $usersprograma): ?>
	<tr>
		<td><?php echo h($usersprograma['Usersprograma']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersprograma['User']['name'], array('controller' => 'users', 'action' => 'view', $usersprograma['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersprograma['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $usersprograma['Programa']['id'])); ?>
		</td>
		<td><?php echo $this->element('layout/status', array('id'=>$usersprograma['Usersprograma']['id'], 'status' => $usersprograma['Usersprograma']['status'])); ?></td>
		<td><?php echo $this->element('layout/status', array('id'=>$usersprograma['Usersprograma']['id'], 'status'=>$usersprograma['Usersprograma']['certificado'])); ?>&nbsp;</td>
		<td><?php echo $this->element('layout/status', array('id'=>$usersprograma['Usersprograma']['id'], 'status'=>$usersprograma['Usersprograma']['reservas'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersprograma['Usersprograma']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $usersprograma['Usersprograma']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $usersprograma['Usersprograma']['id']), null, __('Tem certeza de que deseja excluir # %s?', $usersprograma['Usersprograma']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('Nova', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Certificados', array('action' => 'certificados', 'ext'=>'pdf')); ?></li>
	</ul>
</div>
