<div class="events view">
<h2><?php  echo __('Evento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($event['Event']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo h($event['Event']['local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicado'); ?></dt>
		<dd>
			<?php echo h($event['Event']['publicado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd>
			<?php echo h($event['Event']['inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Termino'); ?></dt>
		<dd>
			<?php echo h($event['Event']['termino']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Realizacao'); ?></dt>
		<dd>
			<?php echo h($event['Event']['realizacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?= $event['Event']['descricao']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total participações'); ?></dt>
		<dd>
			<?php echo h($event['Event']['holding_count']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo $this->Html->image('/files/event/file/'.$event['Event']['file_dir'].'/'.$event['Event']['file'], array('alt'=>$event['Event']['title'],'url' => array('action'=>'view', $event['Event']['id']))); ?>
			&nbsp;
		</dd>	
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar evento'), array('action' => 'delete', $event['Event']['id']), null, __('Tem certeza de que deseja excluir # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Programa'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Usuário'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Programas'); ?></h3>
	<?php if (!empty($event['Programa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Vagas'); ?></th>
		<th><?php echo __('Reservas'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['Programa'] as $programa): ?>
		<tr>
			<td><?php echo $programa['id']; ?></td>
			<td><?php echo $programa['nome']; ?></td>
			<td><?php echo $programa['vagas']; ?></td>
			<td><?php echo $programa['reservas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programas', 'action' => 'view', $programa['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'programas', 'action' => 'edit', $programa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'programas', 'action' => 'delete', $programa['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
