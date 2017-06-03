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
			Nome: &nbsp; &nbsp; &nbsp; <input class="tab_incluir" type="text" name="nome" value="<?php echo $array_produto['nomeProduto']; ?>"><br><br>
			Descrição: <textarea class="tab_incluir" type="text" name="descricao">"<?php echo $array_produto['descProduto'];?>"</textarea><br><br>
			Preço: &nbsp; &nbsp; &nbsp; &nbsp;<input class="tab_incluir" type="text" name="preco" value="<?php echo $array_produto['precProduto']; ?>"><br><br>
			Desconto: &nbsp;<input class="tab_incluir" type="text" name="desconto" value="<?php echo $array_produto['descontoPromocao']; ?>"><br><br>
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
			<input type="hidden" name="id" value="<?php echo $array_produto['idProduto']; ?>">
			<input type="hidden" name="acao" value="editar">
			Ativo: <?php
				if($array_produto['ativoProduto'] == 1){
					echo '<input type="checkbox" name="ativo" checked>';
				}else{
					echo '<input type="checkbox" name="ativo">';
				}
				?><br><br>
			Estoque: &nbsp; &nbsp; <input class="tab_incluir" type="text" name="estoque" value="<?php echo $array_produto['qtdMinEstoque']; ?>"><br><br>
			Imagem: <input type="file" name="imagem"><br><br>
			<input type="submit" value="Gravar" name="btnGravarProduto">
		</form>
	</body>
</html>