<html>
	<head>
		<title>Loja Virtual</title>
		<link rel="stylesheet" type="text/css" href="../layout/estilo.css"/>
	</head>
	<body>
		<center>
			<br><br>
			<div>
				<?php
				if(isset($erro))
					echo "	<font color='red'>
							$erro
							</font>";
				?>
				<br><br>
				<h1>Loja Virtual</h1>
				<form method="post">
					E-mail: <input type="text"  id="email" name="email">
					<br><br>
					Senha: <input type="password" id="senha" name="senha">
					<br><br>
					<input 	type="submit" value="Entrar" name="btn_entrar">
				</form>
			</div>
		</center>
	</body>
</html>