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
			Nome: <input type="text" name="nome" value="<?php echo $array_produto['nomeProduto']; ?>"><br><br>
			Descrição: <input type="text" name="descricao" value="<?php echo $array_produto['descProduto']; ?>"><br><br>
			Preço: <input type="text" name="preco" value="<?php echo $array_produto['precProduto']; ?>"><br><br>
			Desconto: <input type="text" name="desconto" value="<?php echo $array_produto['descontoPromocao']; ?>"><br><br>
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
			<input type="hidden" name="id" value="<?php echo $array_produto['idProduto']; ?>">
			<input type="hidden" name="acao" value="editar">
			Ativo: <?php
				if($array_produto['ativoProduto'] == 1){
					echo '<input type="checkbox" name="ativo" checked>';
				}else{
					echo '<input type="checkbox" name="ativo">';
				}
				?><br><br>
			Estoque: <input type="text" name="estoque" value="<?php echo $array_produto['qtdMinEstoque']; ?>"><br><br>
			Imagem: <input type="text" name="imagem"><br><br>
			<input type="submit" value="Gravar" name="btnGravarProduto">
		</form>
	</body>
</html>