<input id='id' type='hidden' value="<?=$user['User']['id'] ?>"> 
<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Curso'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $user['Curso']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matricula'); ?></dt>
		<dd>
			<?php echo h($user['User']['matricula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Sexo']['nome'], array('controller' => 'sexos', 'action' => 'view', $user['Sexo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cpf'); ?></dt>
		<dd>
			<?php echo h($user['User']['cpf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($user['User']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Dir'); ?></dt>
		<dd>
			<?php echo h($user['User']['image_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holding Count'); ?></dt>
		<dd>
			<?php echo h($user['User']['usersprograma_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código'); ?></dt>
		<dd>
			<div id="barcode"></div>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Votar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Editar usuário'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar usuário'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza de que deseja excluir # %s?', $user['User']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Conteúdos'); ?></h3>
	<?php if (!empty($user['Content'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= 'Titulo'; ?></th>
		<th><?= 'Status'; ?></th>
		<th><?= 'Promovido'; ?></th>
		<th><?= 'Atualizado'; ?></th>
		<th><?= 'Criado em'; ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Content'] as $content): ?>
		<tr>
			<td>
				<?php 
					echo $this->Html->link(
						$content['title'],
						array(
							'controller' => 'contents',
							'action' => 'view',
							$content['id']
						)
					);; 
				?>
			</td>
			<td><?= $content['status']; ?></td>
			<td><?= $content['promote']; ?></td>
			<td><?= $content['updated']; ?></td>
			<td><?= $content['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar'), array('controller' => 'contents', 'action' => 'view', $content['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'contents', 'action' => 'edit', $content['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'contents', 'action' => 'delete', $content['id']), null, __('Tem certeza de que deseja excluir # %s?', $content['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<?php 
	echo $this->Html->script(array(
		'jquery-1.3.2.min',
		'jquery-barcode-2.0.2.min'
	));
?>

 <script type="text/javascript">
	function generateBarcode(){
		value = document.getElementById('id').value;
		$("#canvasTarget").hide();
		$("#barcode").html("").show().barcode(value, 'code128');
	}
	$(function(){
		generateBarcode();
	});
</script>
