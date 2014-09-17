<div class="groups view">
<h2><?php  echo __('Grupo'); ?></h2>
	</p>
	<?php echo __('Nome: ');      ?>
	<?php echo h($group['Group']['name']); ?>
	</p>
	<?php echo __('Descrição:'); ?>
	<?php echo $group['Group']['description']; ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Voltar'), array('controller'=>'users','action' => 'index')); ?> </li>
	</ul>
</div>