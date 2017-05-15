<?php
include ('../db/index.php');
include('../auth/controle_de_acesso.php');


if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
			include('incluir_produto.php');
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
			include('listar_usuario.php');
			break;
	
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarUsuario'])){
		
				//Trata nome
				$nome = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
				
				//Trata Descrição
				$descricao = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['descricao']);
				
				//Trata Preço
				$preco = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['preco']);
				
				//Tratar Desconto
				$desconto = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['desconto']);
				
				//Tratar ID da Categoria
				$categoria = $_POST['categoria'];
				
				//Tratar ID do Usuário
				$usuario = $_SESSION['idUsuario'];
				
				//Tratar Ativo, se colocado qualquer valor é convertido em booleano: verdadeiro ou falso
				$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				//Tratar Estoque
				$estoque = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['estoque']);
				
				if(odbc_exec($db, "	UPDATE 
										Produto
									SET
										loginUsuario = '$email',
										senhaUsuario = HASHBYTES('SHA1','$password'),
										nomeUsuario = '$nome',
										tipoPerfil = '$perfil',
										usuarioAtivo = $ativo
									WHERE
										idUsuario = $idUsuario")){
					$msg = "Usu&aacute;rio gravado com sucesso";
					include('listar_produto.php');
					break;					
				}else{
					$erro = "Erro ao gravar o usu&aacute;rio";
				}
			}
		
			$query_produto	= odbc_exec($db, 'SELECT 
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
									idCategoria,
									ativoProduto,
									idUsuario,
									qtdMinEstoque
								FROM
									Produto
								WHERE
									idProduto = '.$idProduto);
			$array_produto = odbc_fetch_array($query_produto);
		
			include('editar_produto.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{
	
	//Inseri um novo Produto
	if(isset($_POST['btnNovoProduto'])){
		
		//Trata nome
		$nome = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['nome']);
		
		//Trata Descrição
		$descricao = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['descricao']);
		
		//Trata Preço
		$preco = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['preco']);
		
		//Tratar Desconto
		$desconto = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['desconto']);
		
		//Tratar ID da Categoria
		$categoria = $_POST['categoria'];
		
		//Tratar ID do Usuário
		$usuario = $_SESSION['idUsuario'];
		
		//Tratar Ativo, se colocado qualquer valor é convertido em booleano: verdadeiro ou falso
		$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
		$ativo = (bool) $_POST['ativo'];
		$ativo = $ativo === true ? 1 : 0;
		
		//Tratar Estoque
		$estoque = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['estoque']);
		
		if(odbc_exec($db, "INSERT INTO produto
							(nomeProduto,
							descProduto,
							precProduto,
							descontoPromocao,
							idCategoria,
							ativoProduto,
							idUsuario,
							qtdMinEstoque)
						VALUES
							('$nome',
							'$descricao',
							'$preco',
							'$desconto',
							'$categoria',
							'$ativo',
							'$usuario',
							$estoque)
							")){
			$msg = "Produto Gravado com sucesso";
		include('listar_produto.php');
		}else{
			$erro = "Erro ao gravar usuario";
		}
		
	}
	
}

?>