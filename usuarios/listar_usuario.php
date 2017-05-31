<?php
	include('../menu/index.tpl.php');
	include('../menu/head.tpl.php');

?>

<br><table width="100%" border="1">
	<tr>
		<td bgcolor="gray">ID Usuario</td>
		<td bgcolor="gray">Login</td>
		<td bgcolor="gray">Nome</td>
		<td bgcolor="gray">Perfil</td>
		<td bgcolor="gray">Ativo</td>
		<td bgcolor="gray">Editar</td>
		<td bgcolor="gray">Apagar</td>
		<td bgcolor="gray"><a href='incluir_usuario.php'>Novo Usuário</a></td>
	</tr>

<?php

include ('../db/index.php');

if(isset($erro)){
		echo "<center>$erro</center";
	}

	if (isset($msg)){
		echo "<center>$msg</center";

	}

	if(isset($_POST['buscarUsuario'])){
	
	
		

			while ($result = odbc_fetch_array($query)){
				
				echo " <tr>
						<td>{$result['idUsuario']}</td>
						<td>{$result['loginUsuario']}</td>
						<td>{$result['nomeUsuario']}</td>
						<td>{$result['tipoPerfil']}</td>
						<td>{$result['usuarioAtivo']}</td>
						<td><a href='index.php?acao=editar&id={$result['idUsuario']}'>Editar</a></td>
						<td><a href='index.php?acao=excluir&id={$result['idUsuario']}'>Excluir</a></td>
					</tr>";
				
			}	
		
	}else{
	
		$query = odbc_exec($db, 'SELECT * FROM Usuario');	
			
			while ($result = odbc_fetch_array($query)){
				
				echo " <tr>
						<td>{$result['idUsuario']}</td>
						<td>{$result['loginUsuario']}</td>
						<td>{$result['nomeUsuario']}</td>
						<td>{$result['tipoPerfil']}</td>
						<td>{$result['usuarioAtivo']}</td>
						<td><a href='index.php?acao=editar&id={$result['idUsuario']}'>Editar</a></td>
						<td><a href='index.php?acao=excluir&id={$result['idUsuario']}'>Excluir</a></td>
					</tr>";
			}
	}
?>
</table><br><br>
<center><a href='../logout'>Sair</a></center>