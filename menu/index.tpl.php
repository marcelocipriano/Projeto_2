<html>
	<head>
		<title>Loja Virtual</title>
		<link rel="stylesheet" type="text/css" href="../layout/estilo_menu.css"/>
</head>
<body>
	<div id="rodape2"></div>
	<div id="rodape"><table>
			<tr class="nav">
			<td><a href="#">Usuários</a>

				<ul class="sub">
					<li><a href="../usuarios/listar_usuario.php">Listar Usuários</a></li>
					<li><a href="#">Localizar</a></li>
				</ul>
			</td>	
			</tr>
			<tr class="nav">
			<td><a href="#">Produtos</a>

				<ul class="sub">
					
					<li><a href="../produtos/listar_produto.php">Listar Produtos</a></li>
					<li><a href="#">Localizar</a></li>

				</ul>

			</td>
			</tr>
			<tr class="nav">
			<td><a href="#">Categorias</a></td>

			</tr>

		</table>

		<form name="frmBusca" method="post" action="../usuarios/index.php" >
			<input type="text" name="nome" id="texto" placeholder="Buscar"/>
			<input type="hidden" name="acao" value="buscar" >
		    <input type="submit"  value="Buscar" id="btnBusca" name="buscarUsuario"/>
		</form>
		</div>	
</body>
</html>