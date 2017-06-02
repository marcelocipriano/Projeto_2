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
			Nome da Categoria: <input type="text" name="nome" value="<?php echo $array_categoria['nomeCategoria']; ?>"><br><br>
			Descrição: <input type="text" name="descricao" value="<?php echo $array_categoria['descCategoria']; ?>"><br><br>
			<input type="hidden" name="id" value="<?php echo $array_categoria['idCategoria']; ?>">
			<input type="hidden" name="acao" value="editar">
			<input type="submit" value="Gravar" name="btnGravarCategoria">
		</form>
	</body>
</html>