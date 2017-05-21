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
			Preço: <input type="text" name="preco"><br><br>
			Desconto: <input type="text" name="desconto"><br><br>
			Categoria: <select name="categoria">
						<?php
						include ('../db/index.php');
						$query = odbc_exec($db, 'SELECT * FROM categoria');
						
						while ($result = odbc_fetch_array($query)){
							echo "
									<option value='{$result['idCategoria']}'>
										{$result['nomeCategoria']}
									</option>
								";
						}
						?>
						</select><br><br>
			Ativo: <input type="radio" name="ativo" checked><br><br>
			Estoque: <input type="text" name="estoque"><br><br>
			Imagem: <input type="file" name="imagem"><br><br>
			<input type="submit" value="Gravar" name="btnNovoProduto">
		</form>
	</body>
</html>