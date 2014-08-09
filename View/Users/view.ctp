<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Group')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Course')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Course']['name'], array('controller' => 'courses', 'action' => 'view', $user['Course']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('matricula')); ?></dt>
            <dd>
                <?php echo h($user['User']['matricula']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($user['User']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('sexo')); ?></dt>
            <dd>
                <?php echo h($user['User']['sexo']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('username')); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('password')); ?></dt>
            <dd>
                <?php echo h($user['User']['password']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('cpf')); ?></dt>
            <dd>
                <?php echo h($user['User']['cpf']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('phone')); ?></dt>
            <dd>
                <?php echo h($user['User']['phone']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($user['User']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('website')); ?></dt>
            <dd>
                <?php echo h($user['User']['website']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image')); ?></dt>
            <dd>
                <?php echo h($user['User']['image']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('image_dir')); ?></dt>
            <dd>
                <?php echo h($user['User']['image_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('holding_count')); ?></dt>
            <dd>
                <?php echo h($user['User']['holding_count']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($user['User']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($user['User']['created']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Courses')); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Courses']['name'], array('controller' => 'courses', 'action' => 'view', $user['Courses']['id'])); ?>
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

			<?php echo $this->Html->link('Novo '.__('user'),
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
		
		
<?php if (!empty($user['Contact'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Contact')); return false;">
				<?php echo __('Contacts'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Contact" style="display: none;">
	<table class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('user_id'); ?></th>
		<th><?php echo __('title'); ?></th>
		<th><?php echo __('alias'); ?></th>
		<th><?php echo __('body'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('phone'); ?></th>
		<th><?php echo __('email'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('archive'); ?></th>
		<th><?php echo __('notify'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Contact'] as $contact): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $contact['id']; ?></td>
			<td data-th=<?= ucfirst(__('user_id')) ?> ><?php echo $contact['user_id']; ?></td>
			<td data-th=<?= ucfirst(__('title')) ?> ><?php echo $contact['title']; ?></td>
			<td data-th=<?= ucfirst(__('alias')) ?> ><?php echo $contact['alias']; ?></td>
			<td data-th=<?= ucfirst(__('body')) ?> ><?php echo $contact['body']; ?></td>
			<td data-th=<?= ucfirst(__('name')) ?> ><?php echo $contact['name']; ?></td>
			<td data-th=<?= ucfirst(__('phone')) ?> ><?php echo $contact['phone']; ?></td>
			<td data-th=<?= ucfirst(__('email')) ?> ><?php echo $contact['email']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $contact['status']; ?></td>
			<td data-th=<?= ucfirst(__('archive')) ?> ><?php echo $contact['archive']; ?></td>
			<td data-th=<?= ucfirst(__('notify')) ?> ><?php echo $contact['notify']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $contact['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $contact['created']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'contacts', 
						'action' => 'view', 
						$contact['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'contacts', 
						'action' => 'edit', 
						$contact['id']
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


	
		
<?php if (!empty($user['Content'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Content')); return false;">
				<?php echo __('Contents'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Content" style="display: none;">
	<table class='rwd-table'>
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
		<?php foreach ($user['Content'] as $content): ?>
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


	
		
<?php if (!empty($user['Holding'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Holding')); return false;">
				<?php echo __('Holdings'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Holding" style="display: none;">
	<table class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('user_id'); ?></th>
		<th><?php echo __('program_id'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('certificado'); ?></th>
		<th><?php echo __('credenciado'); ?></th>
		<th><?php echo __('reservas'); ?></th>
		<th><?php echo __('presenca'); ?></th>
		<th><?php echo __('date_presenca'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('updated'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Holding'] as $holding): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $holding['id']; ?></td>
			<td data-th=<?= ucfirst(__('user_id')) ?> ><?php echo $holding['user_id']; ?></td>
			<td data-th=<?= ucfirst(__('program_id')) ?> ><?php echo $holding['program_id']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $holding['status']; ?></td>
			<td data-th=<?= ucfirst(__('certificado')) ?> ><?php echo $holding['certificado']; ?></td>
			<td data-th=<?= ucfirst(__('credenciado')) ?> ><?php echo $holding['credenciado']; ?></td>
			<td data-th=<?= ucfirst(__('reservas')) ?> ><?php echo $holding['reservas']; ?></td>
			<td data-th=<?= ucfirst(__('presenca')) ?> ><?php echo $holding['presenca']; ?></td>
			<td data-th=<?= ucfirst(__('date_presenca')) ?> ><?php echo $holding['date_presenca']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $holding['created']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $holding['updated']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'holdings', 
						'action' => 'view', 
						$holding['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'holdings', 
						'action' => 'edit', 
						$holding['id']
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


	
		
<?php if (!empty($user['Message'])): ?>

		<h3>
			<a href="#" onclick="display(document.getElementById('Message')); return false;">
				<?php echo __('Messages'); ?>			</a>
		</h3>
		
	<div class="tabela " id="Message" style="display: none;">
	<table class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('title'); ?></th>
		<th><?php echo __('body'); ?></th>
		<th><?php echo __('notify'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Message'] as $message): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $message['id']; ?></td>
			<td data-th=<?= ucfirst(__('title')) ?> ><?php echo $message['title']; ?></td>
			<td data-th=<?= ucfirst(__('body')) ?> ><?php echo $message['body']; ?></td>
			<td data-th=<?= ucfirst(__('notify')) ?> ><?php echo $message['notify']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $message['status']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $message['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $message['created']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'messages', 
						'action' => 'view', 
						$message['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'messages', 
						'action' => 'edit', 
						$message['id']
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
