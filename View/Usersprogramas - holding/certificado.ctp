<html lang="pt-BR">
<head>
	<title>Certificado</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		body{
			font-family: Arial, Helvetica, sans-serif;
		}

		.tamanho{
			/* background:url('img/template/certificado/certificado5.png'); */
			width: 29.7cm;
			height: 21cm;
		}

		.conteudos{
			top: 8cm;
			left: 5cm;
		}

		.absoluto{
			margin: 0 auto;
			position: absolute;
			width: 20cm;
		}

		.verso{
			left: 1cm;
			margin: 5px;
			text-align: left;
			top: 1cm;
			width: 25cm;
		}

		.gray{
			color: gray;
			font-size: 12px;
		}
	</style>
</head>

<body>
	<center>
		<div class='tamanho'>
			<img src="img/template/certificado/certificado5.png" alt="" height="750px";>
		</div>
		<div class='absoluto conteudos'>
			<span class='gray'>Registro n° 000001, Livro 24 - GIEC</span>
			<?= $participacao['Programa']['certificamos'] ?>
		</div>

		<div class='tamanho'></div>

		<div class='absoluto verso'>
			<h2><?php echo utf8_decode('Conteúdo:') ?></h2>
			<?= $participacao['Programa']['conteudo']; ?>
		</div>
	</center>
</body>
