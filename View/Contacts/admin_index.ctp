<div class="contacts index">
	<h2><?php echo __('Contantos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($contacts as $contact): ?>
	<tr>
		
		<?php if ($contact['Contact']['status'] == false): ?>
			<td>
				<b><?= $contact['User']['name']; ?>&nbsp;<b>
			</td>
		<?php else: ?>
			<td>
				<?php echo h($contact['User']['name']); ?>&nbsp;
			</td>
		<?php endif; ?>

		<td><?php echo h($contact['Contact']['title']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['alias']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $contact['Contact']['id']), null, __('Tem certeza de que deseja excluir # %s?', $contact['Contact']['id'])); ?>
		</td>
	</tr>
	
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Mensagens'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
	</ul>
</div>
