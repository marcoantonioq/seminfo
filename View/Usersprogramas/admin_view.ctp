<input id='id' type='hidden' value="<?=$usersprograma['Usersprograma']['id'] ?>"> 
<div class="usersprogramas view">
	<h2><?php  echo __('Participação'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd id='id'>
			<?= $usersprograma['Usersprograma']['id']; ?>
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersprograma['User']['name'], array('controller' => 'users', 'action' => 'view', $usersprograma['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Programa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersprograma['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $usersprograma['Programa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificado'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['certificado']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Credenciado'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['credenciado']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Reservas'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['reservas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presenca'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['presenca']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($usersprograma['Usersprograma']['updated']); ?>
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
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar participação'), array('action' => 'edit', $usersprograma['Usersprograma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Apagar participação'), array('action' => 'delete', $usersprograma['Usersprograma']['id']), null, __('Tem certeza de que deseja excluir # %s?', $usersprograma['Usersprograma']['id'])); ?> </li>
	</ul>
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
