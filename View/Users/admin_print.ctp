<!doctype html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Usuários</title>
	<?php 
		echo $this->Html->script(array(
			'jquery-1.3.2.min',
			'jquery-barcode-2.0.2.min'
		));
	?>
	<style>
	*{
		font-family: Arial, Helvetica, sans-serif;
		margin: 0;
		padding: 0;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	h3 {
		color: #000000;
		display: block;
		font-size: 25px;
		font-weight: bold;
		line-height: 25px;
	}

	.carta{
		margin: 60px auto;
		padding: 2px 0;
		width: 215.9mm;
		/* height: 279mm; */
		/* background: blue; */
		/* border: 1px dotted #000; */
	}

	.etiqueta{
		background: white;
		float: left;
		height: 33.99mm;
		margin: 8px 10px;
		padding: 2px 6px;
		position: relative;
		text-align: center;
		width: 101.60mm;
		/* background: red; */
	}

	.cod {
		margin: 0 auto;
		bottom: 0;
	}	
	</style>
</head>
<?php 
	define("LATIN1_UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ");
	define("LATIN1_LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý");
?>
<body>
	<?php $i = 0; ?><script type="text/javascript">i = 0;</script>
	
	<div class='carta'>
		<?php foreach ($user as $value):?>
			
			<input id='<?=$i;?>' type='hidden' value="<?= $value['User']['id']; ?>"> 
			
			<div class="etiqueta">

				<h3><?= strtoupper(strtr($value['User']['name'], LATIN1_LC_CHARS, LATIN1_UC_CHARS)); ?></h3>
				
				<div id="<?=$value['User']['id']?>" class='cod'></div>

			</div>

			<script type="text/javascript">
				value = document.getElementById(i).value;
				i++;
				$("#"+value).html("").show().barcode(value, 'code128');
			</script>

			<?php $i++; ?>

		<?php endforeach; ?>
	</div>
</body>
</html>



