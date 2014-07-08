<div class="sexos index">
	<h2><?php echo __('Sexos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('user_count'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($sexos as $sexo): ?>
	<tr>
		<td><?php echo h($sexo['Sexo']['id']); ?>&nbsp;</td>
		<td><?php echo h($sexo['Sexo']['nome']); ?>&nbsp;</td>
		<td><?php echo h($sexo['Sexo']['user_count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $sexo['Sexo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $sexo['Sexo']['id']), null, __('Tem certeza de que deseja excluir # %s?', $sexo['Sexo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
