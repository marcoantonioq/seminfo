<div class="tipoprogramas view">
<h2><?php  echo __('Tipoprograma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoprograma['Tipoprograma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tipoprograma['Tipoprograma']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($tipoprograma['Tipoprograma']['alias']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tipoprograma'), array('action' => 'edit', $tipoprograma['Tipoprograma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipoprograma'), array('action' => 'delete', $tipoprograma['Tipoprograma']['id']), null, __('Tem certeza de que deseja excluir # %s?', $tipoprograma['Tipoprograma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipoprogramas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoprograma'), array('action' => 'add')); ?> </li>
	</ul>
</div>
