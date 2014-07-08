<div class="programasPalestrantes view">
<h2><?php  echo __('Programas Palestrante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($programasPalestrante['ProgramasPalestrante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificado'); ?></dt>
		<dd>
			<?php echo h($programasPalestrante['ProgramasPalestrante']['certificado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Programa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($programasPalestrante['Programa']['id'], array('controller' => 'programas', 'action' => 'view', $programasPalestrante['Programa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Palestrante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($programasPalestrante['Palestrante']['nome'], array('controller' => 'palestrantes', 'action' => 'view', $programasPalestrante['Palestrante']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Programas Palestrante'), array('action' => 'edit', $programasPalestrante['ProgramasPalestrante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Programas Palestrante'), array('action' => 'delete', $programasPalestrante['ProgramasPalestrante']['id']), null, __('Tem certeza de que deseja excluir # %s?', $programasPalestrante['ProgramasPalestrante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas Palestrantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programas Palestrante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Programas'), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa'), array('controller' => 'programas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Palestrantes'), array('controller' => 'palestrantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Palestrante'), array('controller' => 'palestrantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
