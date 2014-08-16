<div class="messages view">
<h2><?php  echo __('Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Typemessage'); ?></dt>
		<dd>
			<?php echo $this->Html->link($message['Typemessage']['name'], array('controller' => 'typemessages', 'action' => 'view', $message['Typemessage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($message['Message']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($message['Message']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notify'); ?></dt>
		<dd>
			<?php echo h($message['Message']['notify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($message['Message']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($message['Message']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($message['Message']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Message'), array('action' => 'edit', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), null, __('Tem certeza de que deseja excluir # %s?', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Typemessages'), array('controller' => 'typemessages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Typemessage'), array('controller' => 'typemessages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Users'); ?></h3>
	<?php if (!empty($message['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Curso Id'); ?></th>
		<th><?php echo __('Matricula'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sexo Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Image Dir'); ?></th>
		<th><?php echo __('Holding Count'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($message['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['curso_id']; ?></td>
			<td><?php echo $user['matricula']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['sexo_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['cpf']; ?></td>
			<td><?php echo $user['telefone']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['image']; ?></td>
			<td><?php echo $user['image_dir']; ?></td>
			<td><?php echo $user['holding_count']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Tem certeza de que deseja excluir # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
