<?php
	include('../menu/index.tpl.php');
?>

<br><table width="80%" border="0">
	<thead>
	<tr valign="top">
		<th bgcolor="gray">Login</th>
		<th bgcolor="gray">Nome</th>
		<th bgcolor="gray">Perfil</th>
		<th bgcolor="gray">Ativo</th>
		<th bgcolor="gray">Editar</th>
		<th bgcolor="gray">Apagar</th>
		<th bgcolor="gray"><a href='incluir_usuario.php'>+ Novo Usu&aacute;rio</a></th>
	</tr>
	</thead>

<?php

include ('../db/index.php');

if(isset($erro)){
		echo "<center style='color:#69BE28'>$erro</center><br>";
	}

	if (isset($msg)){
		echo "<center style='color:#69BE28'>$msg</center><br>";

	}
	


	if(isset($_POST['buscar'])){
	
			$query = odbc_exec($db, "SELECT * FROM Usuario WHERE nomeUsuario LIKE '%".$nome."%'");

				$i = 0;
			
			while ($result = odbc_fetch_array($query)){
							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}				
				

				echo " <tr bgcolor=".$cor.">
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

			$i = 0;

			while ($result = odbc_fetch_array($query)){
							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}
				
				echo " <tr bgcolor=".$cor.">
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