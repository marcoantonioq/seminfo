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
			border-collapse: collapse;
			border: 3px solid #000;

			float: left;
			height: 33.99mm;
			margin: 25px 10px;
			padding: 2px 6px;
			position: relative;
			text-align: center;
			width: 101.60mm;
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
		
		<table class="items" cellpadding="8" border="1">
			<thead>
				<tr>
					<td>
						<h1><?php echo $user['User']['name']; ?></h1>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="barcodecell">
						<barcode code="<?=str_pad($user['User']['id'], 11, '0', STR_PAD_LEFT);?>" class="barcode" />
					</td>
				</tr>
			</tbody>
		</table>
		<?php endforeach; ?>

	</body>
</html>