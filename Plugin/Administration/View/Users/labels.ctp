<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 9pt;
	background: transparent url('bgbarcode.png') repeat-y scroll left top;
}
h5, p {	margin: 0pt;
}
table.items {
	font-size: 9pt; 
	border-collapse: collapse;
	border: 3px solid #880000; 
}
td { vertical-align: top; 
}
table thead td { background-color: #EEEEEE;
	text-align: center;
}
table tfoot td { background-color: #AAFFEE;
	text-align: center;
}
.barcode {
	padding: 1.5mm;
	margin: 0;
	vertical-align: top;
	color: #000000;
}
.barcodecell {
	text-align: center;
	vertical-align: middle;
	padding: 0;
}
</style>
</head>
<body>

<?php //pr($users); ?>

<?php foreach ($users as $key => $user): ?>
<table class="items" width="100%" cellpadding="8" border="1">
	<thead>
		<tr>
			<td>
				<?php echo $user['User']['name']; ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="barcodecell">
				<barcode code="<?php echo str_pad($user['User']['id'], 12, '0', STR_PAD_LEFT); ?>" class="barcode" />
			</td>
		</tr>
	</tbody>
</table>
<?php endforeach; ?>



</body>
</html>