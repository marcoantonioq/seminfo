<div class="contents view">
<h2><?php  echo __('Conteúdo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($content['Content']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($content['Type']['title'], array('controller' => 'types', 'action' => 'view', $content['Type']['id']), array('title'=>'Titulo')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($content['Categoria']['title'], array('controller' => 'categorias', 'action' => 'view', $content['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuário'); ?></dt>
		<dd>
			<?php echo $this->Html->link($content['User']['name'], array('controller' => 'users', 'action' => 'view', $content['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($content['Content']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conteúdo'); ?></dt>
		<dd>
			<?= $content['Content']['body']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>e
		<dd>
			<?php echo h($content['Content']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promovido'); ?></dt>
		<dd>
			<?php echo h($content['Content']['promote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caminho'); ?></dt>
		<dd>
			<?php echo h($content['Content']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($content['Content']['file']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Caminho Foto'); ?></dt>
		<dd>
			<?php echo h($content['Content']['file_dir']); ?>
			<?php echo $this->Html->image('/files/content/file/'.$content['Content']['file_dir'].'/'.$content['Content']['file'], array('alt'=>$content['Content']['title'],'url' => array('action'=>'view', $content['Content']['id']))); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atualizado'); ?></dt>
		<dd>
			<?php echo h($content['Content']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo h($content['Content']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar conteúdo'), array('action' => 'edit', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete conteúdo'), array('action' => 'delete', $content['Content']['id']), null, __('Tem certeza de que deseja excluir # %s?', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Novo conteúdo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo tipo'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
