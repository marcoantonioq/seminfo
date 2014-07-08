<div class="horarios view">
<h2><?php  echo __('Horario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Termino'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['termino']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Horario'), array('action' => 'edit', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Horario'), array('action' => 'delete', $horario['Horario']['id']), null, __('Tem certeza de que deseja excluir # %s?', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Horarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Users Programas'), array('controller' => 'usersprogramas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Programa'), array('controller' => 'usersprogramas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Relacionado Programas'); ?></h3>
	<?php if (!empty($horario['Programa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Tipoprograma Id'); ?></th>
		<th><?php echo __('Horario Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Local'); ?></th>
		<th><?php echo __('Preco'); ?></th>
		<th><?php echo __('Vagas'); ?></th>
		<th><?php echo __('Reservas'); ?></th>
		<th><?php echo __('Filefoto'); ?></th>
		<th><?php echo __('Duracao'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Conteudo'); ?></th>
		<th><?php echo __('File Dir'); ?></th>
		<th><?php echo __('Certificamos'); ?></th>
		<th><?php echo __('Certificamos Palestrante'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Holding Count'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($horario['Programa'] as $programa): ?>
		<tr>
			<td><?php echo $programa['id']; ?></td>
			<td><?php echo $programa['event_id']; ?></td>
			<td><?php echo $programa['tipoprograma_id']; ?></td>
			<td><?php echo $programa['horario_id']; ?></td>
			<td><?php echo $programa['nome']; ?></td>
			<td><?php echo $programa['local']; ?></td>
			<td><?php echo $programa['preco']; ?></td>
			<td><?php echo $programa['vagas']; ?></td>
			<td><?php echo $programa['reservas']; ?></td>
			<td><?php echo $programa['filefoto']; ?></td>
			<td><?php echo $programa['duracao']; ?></td>
			<td><?php echo $programa['file']; ?></td>
			<td><?php echo $programa['conteudo']; ?></td>
			<td><?php echo $programa['file_dir']; ?></td>
			<td><?php echo $programa['certificamos']; ?></td>
			<td><?php echo $programa['certificamos_palestrante']; ?></td>
			<td><?php echo $programa['descricao']; ?></td>
			<td><?php echo $programa['created']; ?></td>
			<td><?php echo $programa['updated']; ?></td>
			<td><?php echo $programa['holding_count']; ?></td>
			<td><?php echo $programa['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programas', 'action' => 'view', $programa['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'programas', 'action' => 'edit', $programa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'programas', 'action' => 'delete', $programa['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['id'])); ?>
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
<div class="related">
	<h3><?php echo __('Relacionado Users Programas'); ?></h3>
	<?php if (!empty($horario['UsersPrograma'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Programa Id'); ?></th>
		<th><?php echo __('Horario Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Certificado'); ?></th>
		<th><?php echo __('Reservas'); ?></th>
		<th><?php echo __('Presenca'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($horario['UsersPrograma'] as $usersPrograma): ?>
		<tr>
			<td><?php echo $usersPrograma['id']; ?></td>
			<td><?php echo $usersPrograma['user_id']; ?></td>
			<td><?php echo $usersPrograma['programa_id']; ?></td>
			<td><?php echo $usersPrograma['horario_id']; ?></td>
			<td><?php echo $usersPrograma['status']; ?></td>
			<td><?php echo $usersPrograma['certificado']; ?></td>
			<td><?php echo $usersPrograma['reservas']; ?></td>
			<td><?php echo $usersPrograma['presenca']; ?></td>
			<td><?php echo $usersPrograma['created']; ?></td>
			<td><?php echo $usersPrograma['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'usersprogramas', 'action' => 'view', $usersPrograma['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'usersprogramas', 'action' => 'edit', $usersPrograma['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'usersprogramas', 'action' => 'delete', $usersPrograma['id']), null, __('Tem certeza de que deseja excluir # %s?', $usersPrograma['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Programa'), array('controller' => 'usersprogramas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
