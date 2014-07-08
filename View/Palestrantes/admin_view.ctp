<div class="palestrantes view">
<h2><?php  echo __('Palestrante'); ?></h2>
	<dl>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filefoto'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['filefoto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['blog']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linkedin'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['linkedin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lattes'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['lattes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($palestrante['Palestrante']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar Palestrante'), array('action' => 'edit', $palestrante['Palestrante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Palestrante'), array('action' => 'delete', $palestrante['Palestrante']['id']), null, __('Tem certeza de que deseja excluir # %s?', $palestrante['Palestrante']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Programa'); ?></h3>
	<?php if (!empty($palestrante['Programa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Duracao'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($palestrante['Programa'] as $programa): ?>
		<tr>
			<td>
				<?php 
					echo $this->Html->link(
						$programa['nome'], 
						array(
							'controller' => 'programas', 
							'action' => 'view', 
							$programa['id']
						)
					); 
				?>
			</td>
			<td><?php echo $programa['duracao']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programas', 'action' => 'view', $programa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'programas_palestrantes', 'action' => 'delete', $programa['ProgramasPalestrante']['id']), null, __('Tem certeza de que deseja remover do palestrante # %s?', $programa['nome'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
