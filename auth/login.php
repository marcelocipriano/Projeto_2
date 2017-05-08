<html>
	<head>
		<title>Loja Virtual</title>
		<link rel="stylesheet" type="text/css" href="../layout/estilo_login.css"/>
	</head>
	<body>
		<div id="rodape"></div>
		<div id="rodape2"></div>
		<center>
			<h1>Loja Virtual</h1>
			<div id="auth"><br>
				<?php
				if(isset($erro))
					echo "<font color='red'>".$erro."</font>";
				?>
				<br><br>
				<form method="post" action="index.php">
					E-mail: <input type="text" id="email" name="email">
					<br><br>
					Senha: <input type="password" id="senha" name="senha">
					<br><br>
					<input 	type="submit" value="Entrar" name="btn_entrar">
				</form>
			</div>
		</center>
	</body>
</html>