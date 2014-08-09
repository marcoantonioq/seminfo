<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($type['Type']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($type['Type']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('alias')); ?></dt>
            <dd>
                <?php echo h($type['Type']['alias']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($type['Type']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($type['Type']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($type['Type']['created']); ?>
                &nbsp;
            </dd>
		</dl>
	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3>Ações</h3>
			
			<?php echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>

			<?php echo $this->Html->link('Novo '.__('type'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block btn-success')
            ); ?>
            <?php echo $this->Html->link('Editar',
                array( 'action' => 'edit', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-warning')
            ); ?>			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
		</div>
	</div>
</div>


<div class="row-fluid">
		
		
<?php if (!empty($type['Content'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Content')); return false;">
				<?php echo __('Contents'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Content" style="display: none;">
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('user_id'); ?></th>
		<th><?php echo __('type_id'); ?></th>
		<th><?php echo __('title'); ?></th>
		<th><?php echo __('body'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('promote'); ?></th>
		<th><?php echo __('path'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('file_dir'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($type['Content'] as $content): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $content['id']; ?></td>
			<td data-th=<?= ucfirst(__('user_id')) ?> ><?php echo $content['user_id']; ?></td>
			<td data-th=<?= ucfirst(__('type_id')) ?> ><?php echo $content['type_id']; ?></td>
			<td data-th=<?= ucfirst(__('title')) ?> ><?php echo $content['title']; ?></td>
			<td data-th=<?= ucfirst(__('body')) ?> ><?php echo $content['body']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $content['status']; ?></td>
			<td data-th=<?= ucfirst(__('promote')) ?> ><?php echo $content['promote']; ?></td>
			<td data-th=<?= ucfirst(__('path')) ?> ><?php echo $content['path']; ?></td>
			<td data-th=<?= ucfirst(__('file')) ?> ><?php echo $content['file']; ?></td>
			<td data-th=<?= ucfirst(__('file_dir')) ?> ><?php echo $content['file_dir']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $content['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $content['created']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'contents', 
						'action' => 'view', 
						$content['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'contents', 
						'action' => 'edit', 
						$content['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				);

			?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>

<?php endif; ?>


		

</div>
