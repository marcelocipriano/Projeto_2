<?php
include('../menu/index.tpl.php');
?>
<br><br><html>
	<head>
	<title>Loja Virtual</title>
	<link rel="stylesheet" type="text/css" href="estilo_menu.css"/>
	<meta charset="ISO-8859-1"/>
	</head>
	<body>
		<form method="post" action="index.php">
			Nome: <input type="text" name="nome"><br><br>
			Descrição: <input type="text" name="descricao"><br><br>
			<input type="hidden" name="acao" value="editar">
			<input type="submit" value="Gravar" name="btnNovaCategoria">
		</form>
	</body>
</html>