<?php 
	define("LATIN1_UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ");
	define("LATIN1_LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý");

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certificados</title>
	<style type="text/css">
		* {
			margin:0;
			padding:0;
		}
		body {
			background-color: #ffffff;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 12px;
			font-weight: normal;
		}

		h1, h2, h3, h4 {
			font-weight: normal;
			margin-bottom:0.5em;
		}
		h1 {
			background:#fff;
			color: #003d4c;
			font-size: 100%;
		}
		h2 {
			background:#fff;
			color: #e32;
			font-family:'Open Sans', Helvetica Neue, Helvetica, Sans-serif;
			font-size: 190%;
		}
		h3 {
			color: #2c6877;
			font-family:'Open Sans', Helvetica Neue, Helvetica, Sans-serif;
			font-size: 165%;
		}
		h4 {
			color: #993;
			font-weight: normal;
		}
		table {
			border-right:0;
			clear: both;
			color: #333;
			margin-bottom: 10px;
			width: 100%;
		}
		th {
			border:0;
			border-bottom:2px solid #555;
			text-align: left;
			padding:4px;
		}
		th a {
			display: block;
			padding: 2px 4px;
			text-decoration: none;
		}
		th a.asc:after {
			content: ' ⇣';
		}
		th a.desc:after {
			content: ' ⇡';
		}
		table tr td {
			padding: 6px;
			text-align: left;
			vertical-align: top;
			border-bottom:1px solid #ddd;
		}
		table tr:nth-child(even) {
			background: #f9f9f9;
		}
		td.actions {
			text-align: center;
			white-space: nowrap;
		}
		table td.actions a {
			margin: 0px 3px;
			padding:2px 5px;
		}
	</style> 
</head>
<body>
	<div class="">
		<center><h2>Instituto Federal Goiano - Campus Urutaí</h2></center>
		<center><h3>Livro 24 - GIEC/IFGioano-Urutaí</h3></center>
		<h3>Certificados</h3>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th>CÓDIGO</th>
				<th>PROGRAMA</th>
		</tr>
		<?php $name = null;  ?>
		<?php foreach ($usersprogramas as $usersprograma): ?>		
			<?php 
				if( $name != $usersprograma['User']['name'] ):
					$name = $usersprograma['User']['name'];
			?>
			<tr>
				<td colspan="2">
					<strong>ALUNO: <?= strtoupper(strtr($name, LATIN1_LC_CHARS, LATIN1_UC_CHARS)); ?>;</strong>
					CÓDIGO ALUNO: <?= $usersprograma['User']['id'] ?>
				</td>
			</tr>
			<?php endif; ?>
			<tr>
				<td><?= $usersprograma['Usersprograma']['id']; ?></td>
				<td><?= $usersprograma['Programa']['nome'];?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
		
</body>
</html>
