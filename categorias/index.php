<?php
include ('../db/index.php');
include('../auth/controle_de_acesso.php');


if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
			include('incluir_categoria.php');
			break;
		
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($result = odbc_exec($db, "DELETE FROM Categoria WHERE IdCategoria = {$_GET['id']}")){
					if(odbc_num_rows($result) > 0){
					$msg = "Categoria excluida com sucesso!";

					}
				}else{
						$erro = "Erro ao excluir a categoria!";
				}
			}else{
				$erro = "ID Invalido";
			}
			include('listar_categoria.php');
			break;
	
		case 'editar':
		
			$idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarCategoria'])){
		
				//trata nome
				$nome = preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['nome']);
		
				//trata a descriчуo
				$descricao = preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['descricao']);
				
				if(odbc_exec($db, "	UPDATE 
										Categoria
									SET
										nomeCategoria = '$nome',
										descCategoria = '$descricao'
									WHERE
										idCategoria = $idCategoria")){
					$msg = "Usu&aacute;rio gravado com sucesso!";
					include('listar_categoria.php');
					break;					
				}else{
					$erro = "Erro ao gravar o usu&aacute;rio!";
				}
			}
		
			$query_categoria	= odbc_exec($db, 'SELECT 
									idCategoria,
									nomeCategoria,
									descCategoria
								FROM
									Categoria
								WHERE
									idCategoria = '.$idCategoria);
			$array_categoria = odbc_fetch_array($query_categoria);
		
			include('editar_categoria.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida!";
	}
	
}else{
	
	//Inseri um novo categoria
	if(isset($_POST['btnNovaCategoria'])){
		
		//Trata nome
		$nome = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		
		//trata descriчуo
		$descricao = preg_replace("/[^a-z A-Z 0-9 ]+/", "", $_POST['descricao']);
		
		if(odbc_exec($db, "INSERT INTO Categoria
							(nomeCategoria,
							descCategoria)
							VALUES
							('$nome',
							'$descricao')
							")){
			$msg = "Categoria Gravada com sucesso!";
		include('listar_categoria.php');
		}else{
			$erro = "Erro ao gravar Categoria!";
		}
		
	}
	
}

?>