<?php
include('../menu/index.tpl.php');
include('../menu/head.tpl.php');
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
			E-mail: <input type="email" name="email"><br><br>
			Senha: <input type="password" name="senha"><br><br>
			Perfil: <select name="perfil">
						<option value="A">
							Administrador
						</option>
						<option value="C">
							Cliente
						</option>
					</select><br><br>
			Ativo: <input type="radio" name="ativo" checked><br><br>
			<input type="submit" value="Gravar" name="btnNovoUsuario">
		</form>
	</body>
</html>