<div class="documents view">
    <h2><?php  echo __('Document'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
			<?php echo h($document['Document']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Program'); ?></dt>
        <dd>
			<?php echo $this->Html->link($document['Program']['id'], array('controller' => 'programs', 'action' => 'view', $document['Program']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
			<?php echo h($document['Document']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('File'); ?></dt>
        <dd>
			<?php echo h($document['Document']['file']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
			<?php echo h($document['Document']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Updated'); ?></dt>
        <dd>
			<?php echo h($document['Document']['updated']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Document'), array('action' => 'edit', $document['Document']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']), null, __('Tem certeza de que deseja excluir # %s?', $document['Document']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Documents'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New programs'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
    </ul>
</div>
