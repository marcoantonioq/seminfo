<div class="documents index">
    <h2><?php echo __('Documentos'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('program_id', 'Programs'); ?></th>
            <th><?php echo $this->Paginator->sort('title', 'Título'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('updated'); ?></th>
            <th class="actions"><?php echo __('Ações'); ?></th>
        </tr>
		<?php foreach ($documents as $document): ?>
        <tr>
            <td><?php echo h($document['Document']['id']); ?>&nbsp;</td>
            <td>
				<?php echo $this->Html->link($document['Program']['id'], array('controller' => 'programs', 'action' => 'view', $document['Program']['id'])); ?>
            </td>
            <td><?php echo h($document['Document']['title']); ?>&nbsp;</td>
            <td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
            <td><?php echo h($document['Document']['updated']); ?>&nbsp;</td>
            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $document['Document']['id'])); ?>
            </td>
        </tr>
	<?php endforeach; ?>
    </table>

<?php echo $this->element('pagination');?>

    <div class="actions">
        <h3><?php echo __('Ações'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Novo documento'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('Listar programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Novo programs'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
        </ul>
    </div>
