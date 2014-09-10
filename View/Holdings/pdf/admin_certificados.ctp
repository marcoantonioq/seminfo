<?php 
	define("LATIN1_UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ");
	define("LATIN1_LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý");
 ?>
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Certificados</title>
</head>
<body>
	<div class="">
		<h2>Certificados</h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th>Codigo</th>
				<th>Aluno</th>
				<th>Programa</th>
				<th>Certificado</th>
		</tr>
		<?php foreach($holdings as $holding): ?>		
			<?php pr($holding); ?>
		<?php endforeach; ?>
		</table>
	</div>

</body>
</html>