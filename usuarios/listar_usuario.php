<?php
	include('../menu/index.tpl.php');
?>

<br><br><center><table width="80%">
	<thead>
	<tr height="20px">
		<th bgcolor="gray">Nome</th>
		<th bgcolor="gray">Login</th>
		<th bgcolor="gray">Perfil</th>
		<th bgcolor="gray">Ativo</th>
		<th bgcolor="gray">Editar</th>
		<th bgcolor="gray">Apagar</th>
		<th width="95px"><button><b><a style="bgcolor:gray; text-decoration:none; color:#69BE28" href='incluir_usuario.php'>Criar Usu&aacute;rio</a></b></button></th>
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
				

				echo " <tr bgcolor=".$cor." align='center'>
						<td>".utf8_encode($result['nomeUsuario'])."</td>
						<td>".utf8_encode($result['loginUsuario'])."</td>
						<td>{$result['tipoPerfil']}</td>
						<td>{$result['usuarioAtivo']}</td>
						<td><a href='index.php?acao=editar&id={$result['idUsuario']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
						<td><a href='index.php?acao=excluir&id={$result['idUsuario']}'><i style='color:black' class='fa fa-trash-o' aria-hidden='true'></i></a></td>
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
				
				echo " <tr bgcolor=".$cor." align='center'>	
						<td>".utf8_encode($result['nomeUsuario'])."</td>
						<td>".utf8_encode($result['loginUsuario'])."</td>
						<td>{$result['tipoPerfil']}</td>
						<td>{$result['usuarioAtivo']}</td>
						<td><a href='index.php?acao=editar&id={$result['idUsuario']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
						<td><a href='index.php?acao=excluir&id={$result['idUsuario']}'><i style='color:black' class='fa fa-trash-o' aria-hidden='true'></i></a></td>
					</tr>";
			}
	}


?>
</table></center>