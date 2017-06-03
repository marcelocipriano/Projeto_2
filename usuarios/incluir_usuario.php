<?php
	include('../menu/index.tpl.php');
?>

<br><br><html>
	<head>
	<title>Delta Sports</title>
	<link rel="stylesheet" type="text/css" href="../layout/tab_usuario.css"/>
	<meta charset="ISO-8859-1"/>
	</head>
	<body>
		<form id="tab_incluir" method="post" action="index.php">
			Nome: <input type="text" name="nome" class="n_incluir"><br><br>
			E-mail: <input type="email" name="email" class="n_incluir"><br><br>
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
			<input type="submit" value="Gravar" name="btnNovoUsuario" id="gravar">
		</form>
	</body>
</html>