<div class="palestrantes index">
	<h2><?php echo __('Palestrantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($palestrantes as $palestrante): ?>
	<tr>
		<td><?php echo h($palestrante['Palestrante']['nome']); ?>&nbsp;</td>
		<td><?php echo h($palestrante['Palestrante']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($palestrante['Palestrante']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $palestrante['Palestrante']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $palestrante['Palestrante']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $palestrante['Palestrante']['id']), null, __('Tem certeza de que deseja excluir # %s?', $palestrante['Palestrante']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>	
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo palestrante'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
	</ul>
</div>
