<div class="programas index">
	<h2><?php echo __('Programas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome', 'Evento - Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('vagas'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoprograma_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usersprograma_count', 'Inscritos'); ?></th>
			<th><?php echo $this->Paginator->sort('duracao', 'Duração'); ?></th>
			<!-- <th>Horários</th> -->
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($programas as $programa): ?>
	<tr>
		<td><?php echo h($programa['Programa']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($programa['Event']['nome'].' - '.$programa['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $programa['Event']['id'])); ?>
		</td>
		<td><?= ($programa['Programa']['vagas'] - $programa['Programa']['usersprograma_count']); ?>&nbsp;</td>
		<td><?= $programa['Tipoprograma']['title']; ?>&nbsp;</td>
		
		<td><?php echo h($programa['Programa']['usersprograma_count']); ?>&nbsp;</td>
		<!-- <td><?php echo $programa['Horario']['alias'] ?></td> -->
		<td><?php echo h($programa['Programa']['duracao']); ?>&nbsp;</td>
		<td><?php echo h($programa['Programa']['status']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('V'), array('action' => 'view', $programa['Programa']['id'])); ?>
			<?php echo $this->Html->link(__('E'), array('action' => 'edit', $programa['Programa']['id'])); ?>
			<?php echo $this->Form->postLink(__('D'), array('action' => 'delete', $programa['Programa']['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['Programa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>	
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Evento'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
	</ul>
</div>
