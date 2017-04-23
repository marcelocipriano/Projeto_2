<table width="100%" border="1">
	<tr>
		<td bgcolor="gray">ID Usuario</td>
		<td bgcolor="gray">Login</td>
		<td bgcolor="gray">Senha</td>
		<td bgcolor="gray">Nome</td>
		<td bgcolor="gray">Editar</td>
		<td bgcolor="gray">Apagar</td>
		<td bgcolor="gray"><a href='incluir_usuario.php'>Gravar</a></td>
	</tr>

<?php

include('../auth/controle_de_acesso.php');
include('../db/index.php');

$query = odbc_exec($db,' SELECT * FROM Usuario');

//$result = odbc_fetch_array($query);
	
//	echo "Nome: {$result['nomeUsuario']}<br>";
	
	
	while ($result = odbc_fetch_array($query)){
		
		echo " <tr>
				<td>{$result['idUsuario']}</td>
				<td>{$result['loginUsuario']}</td>
				<td>{$result['senhaUsuario']}</td>
				<td>{$result['nomeUsuario']}</td>
				<td><a href='?acao=excluir&id={$result['idUsuario']}'>Excluir</a></td>
			</tr>";
	}
	


if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
		
			break;
		
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($result = odbc_exec($db, "DELETE FROM Usuario WHERE IdUsuario = {$_GET['id']}")){
					if(odbc_num_rows($result) > 0){
					$msg = "Usuario excluido com sucesso";
					}
				}else{
						$erro = "Erro ao excluir o usuario";
				}
			}else{
				$erro = "ID Invalido";
			}
			break;
		default:
			$query = odbc_exec($db,' SELECT * FROM Usuario');

//$result = odbc_fetch_array($query);
	
//	echo "Nome: {$result['nomeUsuario']}<br>";
	
	
	while ($result = odbc_fetch_array($query)){
		
		echo " <tr>
				<td>{$result['idUsuario']}</td>
				<td>{$result['loginUsuario']}</td>
				<td>{$result['senhaUsuario']}</td>
				<td>{$result['nomeUsuario']}</td>
				<td><a href='?acao=excluir&id={$result['idUsuario']}'>Excluir</a></td>
			</tr>";
	}
		
	}
	
}else{
	if(isset($_POST['btnGravar'])){
		
		//Trata nome
		$nome = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		
		//Trata email
		$email_exploded = explode();
		$email = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['email']);
		
		//Trata senha
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		
		//Tratar Perfil
		$perfil = $_POST['Perfil'] != 'A' && $_POST['Perfil'] != 'C' ? 'C': $_POST['Perfil'];
		
		//Tratar Ativo, se colocado qualquer valor é convertido em booleano: verdadeiro ou falso
		$_POST $ativo
		$ativo = (bool) $_POST['ativo'];
		$ativo = $ativo === true ? 1 : 0;
		
		if(odbc_exec($db, "INSERT INTO Usuario
							(LoginUsuario,
							senhaUsusario,
							nomeUsuario,
							tipoPerfil,
							usuarioAtivo)
							VALUES
							('$email',
							HASHBYTES('SHA1', ''),
							'$nome',
							'$perfil',
							$ativo)
							")){
			$msg = "Usuario Gravado com sucesso";
		}else{
			$erro = "Erro ao gravar usuario";
		}
		
	}
}

?>
</table>