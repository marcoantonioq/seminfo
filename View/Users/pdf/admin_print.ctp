
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuários</title>
</head>
<body>
	<?php foreach ($user as $value):?>
	<dl>
		<dt><?= 'Usuário'; ?></dt>
		<dd>
			<?= $value['User']['name']; ?>
		</dd>
		<dt><?php echo __('Código'); ?></dt>
		<dd>
			<div id="barcode"></div>
		</dd>
		<dt><?= 'Identificado'; ?></dt>
		<dd id='id'>
			<?= $value['User']['id']; ?>
		</dd>
	</dl>
	<?php endforeach; ?>
</body>
<?php pr($user); ?>

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

</html>