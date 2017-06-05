<?php
include('../menu/index.tpl.php');
?>
<br><br><html>
	<head>
	<title>Delta Sports</title>
	<link rel="stylesheet" type="text/css" href="../layout/estilo_categoria.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	<body>
		<form id="tab_categoria" method="post" action="index.php">
			Nome: &nbsp; &nbsp; &nbsp; <input class="tab_incluir" type="text" name="nome" value="<?php echo utf8_encode($array_categoria['nomeCategoria']); ?>"><br><br>
			Descrição: <textarea class="tab_incluir" type="text" name="descricao">"<?php echo utf8_encode($array_categoria['descCategoria']); ?>"</textarea><br><br>
			<input type="hidden" name="id" value="<?php echo $array_categoria['idCategoria']; ?>">
			<input type="hidden" name="acao" value="editar">
			<input type="submit" value="Gravar" name="btnGravarCategoria" id="gravar">
		</form>
	</body>
</html>