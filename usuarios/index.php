<?php
include ('../db/index.php');
include('../auth/controle_de_acesso.php');


if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
			include('incluir_usuario.php');
			break;
		
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($result = odbc_exec($db, "DELETE FROM Usuario WHERE IdUsuario = {$_GET['id']}")){
					if(odbc_num_rows($result) > 0){
					$msg = "Usuario excluido com sucesso!";

					}
				}else{
						$erro = "Erro ao excluir o usuario!";
				}
			}else{
				$erro = "ID Invalido";
			}
			include('listar_usuario.php');
			break;
	
		case 'editar':
		
			$idUsuario = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarUsuario'])){
		
				//trata nome
				$nome = preg_replace(	"/[^a-zA-Z0-9 ]+/", "", $_POST['nome']);
		
				//trata email
				$email_exploded = 
				explode('@',$_POST['email']);
				$email_comeco = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[0]);
				$email_fim = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[1]);
				$email = $email_comeco.'@'.$email_fim;
				
				//trata senha
				$password = str_replace('"','',$_POST['senha']);
				$password = str_replace("'",'',$password);
				$password = str_replace(';','',$password);
				
				//trata perfil
				$perfil = 	$_POST['perfil'] != 'A' 
							&& $_POST['perfil'] != 'C' 
							? 'C' :	$_POST['perfil'];
				
				//trata ativo
				$_POST['ativo'] = 
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				if(odbc_exec($db, "	UPDATE 
										Usuario
									SET
										loginUsuario = '$email',
										senhaUsuario = HASHBYTES('SHA1','$password'),
										nomeUsuario = '$nome',
										tipoPerfil = '$perfil',
										usuarioAtivo = $ativo
									WHERE
										idUsuario = $idUsuario")){
					$msg = "Usu&aacute;rio gravado com sucesso!";
					include('listar_usuario.php');
					break;					
				}else{
					$erro = "Erro ao gravar o usu&aacute;rio!";
				}
				echo odbc_errormsg($db);
			}
		
			$query_usuario	= odbc_exec($db, 'SELECT
									loginUsuario,
									senhaUsuario,
									nomeUsuario,
									tipoPerfil,
									usuarioAtivo
								FROM
									Usuario
								WHERE
									idUsuario = '.$idUsuario);
			$array_usuario = odbc_fetch_array($query_usuario);
		
			include('editar_usuario.php');
			
			break;
		
		case 'buscar':
		
			$nome = $_POST['nome'];

			$query = odbc_exec($db, "SELECT * FROM Usuario WHERE nomeUsuario LIKE '%".$nome."%'");
			$query2 = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto LIKE '%".$nome."%'");

			if(odbc_num_rows($query) > 0){
			
				include('listar_usuario.php');
			}elseif(odbc_num_rows($query2) > 0){

				include('../produtos/listar_produto.php');	
			}else{
				echo "nada...";
			}
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida!";
	}
	
}else{
	
	//Inseri um novo usuario
	if(isset($_POST['btnNovoUsuario'])){
		
		//Trata nome
		$nome = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		
		//Trata email
		$email_exploded = explode('@',$_POST['email']);
		$email_comeco = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[0]);
		$email_fim = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[1]);
		$email = $email_comeco.'@'.$email_fim;
		
		//Trata senha
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['senha']);
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['senha']);
		$senha = str_replace("/[^a-z A-Z 0-9]+/", "", $_POST['senha']);
		
		//Tratar Perfil
		$perfil = $_POST['perfil'] != 'A' && $_POST['perfil'] != 'C' ? 'C': $_POST['perfil'];
		
		//Tratar Ativo, se colocado qualquer valor é convertido em booleano: verdadeiro ou falso
		$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
		$ativo = (bool) $_POST['ativo'];
		$ativo = $ativo === true ? 1 : 0;
		
		if(odbc_exec($db, "INSERT INTO Usuario
							(LoginUsuario,
							senhaUsuario,
							nomeUsuario,
							tipoPerfil,
							usuarioAtivo)
							VALUES
							('$email',
				   HASHBYTES('SHA1', '$senha'),
							'$nome',
							'$perfil',
							$ativo)
							")){
			$msg = "Usuario Gravado com sucesso!";
		include('listar_usuario.php');
		}else{
			$erro = "Erro ao gravar usuario!";
		}
		
	}
	
}

?>