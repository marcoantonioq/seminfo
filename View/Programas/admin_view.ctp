<div class="programas view">
<h2><?php  echo __('Programa'); ?></h2>
	<dl>	
		<dt><?php echo __('Evento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($programa['Event']['nome'], array('controller' => 'events', 'action' => 'view', $programa['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo da programação'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['tipoprograma_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preço'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['preco']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Vagas'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['vagas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservas'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['reservas']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Inscritos'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['usersprograma_count']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Duração'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['duracao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['file']); ?>
			<?php echo h($programa['Programa']['file_dir']); ?>
			&nbsp;
		</dd>
		<dt><?= 'Conteúdo'; ?></dt>
		<dd>
			<?= $programa['Programa']['conteudo']; ?>
			&nbsp;
		</dd>

		<dt><?='certificamos'; ?></dt>
		<dd>
			<?=$programa['Programa']['certificamos']; ?>
			&nbsp;
		</dd>

		<dt><?= 'Certificado palestrante'; ?></dt>
		<dd>
			<?=$programa['Programa']['certificamos_palestrante']; ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['status']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Início'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['inicio']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Termino'); ?></dt>
		<dd>
			<?php echo h($programa['Programa']['termino']); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('Voltar', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar Programa'), array('action' => 'edit', $programa['Programa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Programa'), array('action' => 'delete', $programa['Programa']['id']), null, __('Tem certeza de que deseja excluir # %s?', $programa['Programa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Programa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Palestrante'), array('controller' => 'palestrantes', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Palestrantes'); ?></h3>
	<?php if (!empty($programa['Palestrante'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($programa['Palestrante'] as $palestrante): ?>
		<tr>
			<td><?php echo $palestrante['nome']; ?></td>
			<td><?php echo $palestrante['telefone']; ?></td>
			<td><?php echo $palestrante['email']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'palestrantes', 'action' => 'view', $palestrante['id'])); ?>
				<?php echo $this->Form->postLink('Apagar', array('controller' => 'programas_palestrantes', 'action' => 'delete', $palestrante['ProgramasPalestrante']['id']), null, __('Tem certeza de que deseja remover palestrante # %s?', $palestrante['nome'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
