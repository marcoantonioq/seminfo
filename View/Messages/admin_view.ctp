<div class="messages view">
<h2><?php  echo __('Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($message['Message']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conteúdo'); ?></dt>
		<dd>
			<?= $message['Message']['body']; ?>
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
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar mensagem'), array('action' => 'edit', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $message['Message']['id']), null, __('Tem certeza de que deseja excluir # %s?', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Nova mensagem'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Usuários'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('email'); ?></th>
		<th><?php echo __('telefone'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		foreach ($message['User'] as $content): ?>
		<tr>
			<td><?php echo $content['id']; ?></td>
			<td><?php echo $content['name']; ?></td>
			<td><?php echo $content['email']; ?></td>
			<td><?php echo $content['telefone']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $content['id'])); ?>
				<?php //echo $this->Form->postLink(__('Deletar'), array('controller' => 'users', 'action' => 'delete', $content['id']), null, __('Tem certeza de que deseja excluir # %s?', $content['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</div>
