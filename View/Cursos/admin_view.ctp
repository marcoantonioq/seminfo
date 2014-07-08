<div class="cursos view">
<h2><?php  echo __('Curso'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?= $curso['Curso']['body']; ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('User Count'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['user_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Documento Count'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['documento_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($curso['Curso']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Curso'), array('action' => 'edit', $curso['Curso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Curso'), array('action' => 'delete', $curso['Curso']['id']), null, __('Tem certeza de que deseja excluir # %s?', $curso['Curso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Documents'); ?></h3>
	<?php if (!empty($curso['Document'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Curso Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($curso['Document'] as $document): ?>
		<tr>
			<td><?php echo $document['id']; ?></td>
			<td><?php echo $document['curso_id']; ?></td>
			<td><?php echo $document['title']; ?></td>
			<td><?php echo $document['file']; ?></td>
			<td><?php echo $document['created']; ?></td>
			<td><?php echo $document['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'documents', 'action' => 'view', $document['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'documents', 'action' => 'edit', $document['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'documents', 'action' => 'delete', $document['id']), null, __('Tem certeza de que deseja excluir # %s?', $document['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Users'); ?></h3>
	<?php if (!empty($curso['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('Curso Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Matricula'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Activation Key'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Timezone'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Evento Count'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($curso['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['grupo_id']; ?></td>
			<td><?php echo $user['curso_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['matricula']; ?></td>
			<td><?php echo $user['cpf']; ?></td>
			<td><?php echo $user['telefone']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['activation_key']; ?></td>
			<td><?php echo $user['image']; ?></td>
			<td><?php echo $user['bio']; ?></td>
			<td><?php echo $user['timezone']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['evento_count']; ?></td>
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
