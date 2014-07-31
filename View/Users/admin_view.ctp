<div class="row-fluid">

	<div class='span8'>		
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

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>

			<?php echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block')
			); ?>

            <?php 
			
			echo $this->Html->link('Novo',
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block')
            ); ?>
		</div>
	</div>

</div>

<input id='id' type='hidden' value="<?=$user['User']['id'] ?>"> 

<?php 
	echo $this->Html->script(array(
		// 'jquery-1.3.2.min',
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
