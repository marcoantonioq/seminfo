<style type="text/css">
	/*
	* Tables
	*/
	.etiqueta {
		border: 1px solid #000;
		float: left;
		height: 33.99mm;
		margin: 5mm 0 0 3mm;
		position: relative;
		text-align: center;
		width: 93mm;
	}

	h1 {
		line-height: 0;
	}

	.code {
		margin: 0 auto;
		padding: 0 10px;
		width: 170px;
	}
</style>


<?php //pr($users); ?>

<div class="page">

	<?php foreach ($users as $key => $user): ?>
		<div class="etiqueta">
			<div class="name">
				<h1><?php echo $user['User']['name']; ?></h1>				
			</div>
			<div class="code">
				<span class="barcode" value="<?=$user['User']['id'];?>"></span>				
			</div>
		</div>
	<?php endforeach; ?>

</div>
