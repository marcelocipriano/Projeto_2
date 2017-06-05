<html>
	<head>
		<title>Delta Sports</title>
		<link rel="stylesheet" type="text/css" href="../layout/estilo_menu.css"/>
		<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<div id="rodape2"></div>
	<div id="rodape">
	<img id="logo" src="../layout/logoDelta.jpg"/>
		<table id="tab">
			<tr class="nav">
				<td>
					<a href="../usuarios/listar_usuario.php">Usu&aacute;rios</a>
				</td>	
			</tr>
			<tr class="nav">
				<td>
					<a href="../Produtos/listar_produto.php">Produtos</a>
				</td>
			</tr>
			<tr class="nav">
				<td>
					<a href="../categorias/listar_categoria.php">Categorias</a>
				</td>
		</table>

		<form id="frmbusca" name="frmBusca" method="post" action="../usuarios/index.php" >
			<input type="text" name="nome" id="texto" placeholder="Buscar"/>
			<input type="hidden" name="acao" value="buscar" >
		    <input type="submit"  value="Buscar" id="btnBusca" name="buscar"/>
		</form>

			<b><a id="sair" href='../logout'><i id="logout" class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a></b>
		</div>	
</body>
</html>