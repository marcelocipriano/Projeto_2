<?php
	ini_set ('odbc.defaultlrl', 9000000);
	include('../menu/index.tpl.php');
?>

<br><br><html>
	<head>
	<title>Delta Sports</title>
	<link rel="stylesheet" type="text/css" href="../layout/tab_produto.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	<body>
		<form id="tab_produto" method="post" action="index.php" enctype="multipart/form-data">
			Nome: &nbsp; &nbsp; &nbsp; <input class="tab_incluir" type="text" name="nome"><br><br>
			Descri&ccedil;&atilde;o: <textarea class="tab_incluir" type="text" name="descricao"></textarea><br><br>
			Pre&ccedil;o: &nbsp; &nbsp; &nbsp; &nbsp;<input class="tab_incluir" type="text" name="preco"><br><br>
			Desconto: &nbsp;<input  class="tab_incluir" type="text" name="desconto"><br><br>
			Categoria: &nbsp;<select name="categoria">
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
			Estoque: &nbsp; &nbsp; <input  class="tab_incluir" type="text" name="estoque"><br><br>
			Imagem: <input type="file" name="imagem"><br><br>
			<input type="submit" value="Gravar" name="btnNovoProduto" id="gravar">
		</form>
	</body>
</html>