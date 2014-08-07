<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('alias')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['alias']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('class')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['class']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('weight')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['weight']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('link_count')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['link_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('params')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['params']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($menu['Menu']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('menu'),
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
		
		
<?php if (!empty($menu['Link'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Link')); return false;">
				<?php echo __('Links'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Link" style="display: none;">
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('parent_id'); ?></th>
		<th><?php echo __('menu_id'); ?></th>
		<th><?php echo __('title'); ?></th>
		<th><?php echo __('class'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('link'); ?></th>
		<th><?php echo __('target'); ?></th>
		<th><?php echo __('rel'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('lft'); ?></th>
		<th><?php echo __('rght'); ?></th>
		<th><?php echo __('visibility_roles'); ?></th>
		<th><?php echo __('params'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($menu['Link'] as $link): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $link['id']; ?></td>
			<td data-th=<?= ucfirst(__('parent_id')) ?> ><?php echo $link['parent_id']; ?></td>
			<td data-th=<?= ucfirst(__('menu_id')) ?> ><?php echo $link['menu_id']; ?></td>
			<td data-th=<?= ucfirst(__('title')) ?> ><?php echo $link['title']; ?></td>
			<td data-th=<?= ucfirst(__('class')) ?> ><?php echo $link['class']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $link['description']; ?></td>
			<td data-th=<?= ucfirst(__('link')) ?> ><?php echo $link['link']; ?></td>
			<td data-th=<?= ucfirst(__('target')) ?> ><?php echo $link['target']; ?></td>
			<td data-th=<?= ucfirst(__('rel')) ?> ><?php echo $link['rel']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $link['status']; ?></td>
			<td data-th=<?= ucfirst(__('lft')) ?> ><?php echo $link['lft']; ?></td>
			<td data-th=<?= ucfirst(__('rght')) ?> ><?php echo $link['rght']; ?></td>
			<td data-th=<?= ucfirst(__('visibility_roles')) ?> ><?php echo $link['visibility_roles']; ?></td>
			<td data-th=<?= ucfirst(__('params')) ?> ><?php echo $link['params']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $link['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $link['created']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'links', 
						'action' => 'view', 
						$link['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'links', 
						'action' => 'edit', 
						$link['id']
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
