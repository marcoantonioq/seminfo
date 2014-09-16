<div class="tipoprogramas view">
<h2><?php  echo __('Tipoprogram'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoprogram['Tipoprogram']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tipoprogram['Tipoprogram']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($tipoprogram['Tipoprogram']['alias']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Tipoprogramas'), array('action' => 'index')); ?> </li>
	</ul>
</div>
