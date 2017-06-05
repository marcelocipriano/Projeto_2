<?php
ini_set ('odbc.defaultlrl', 9000000);//muda configuraзгo do PHP para trabalhar com imagens no DB
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
				if($result = odbc_exec($db, "DELETE FROM Produto WHERE IdProduto = {$_GET['id']}")){
					if(odbc_num_rows($result) > 0){
					$msg = "Produto excluido com sucesso!";

					}
				}else{
						$erro = "Erro ao excluir Produto!";
				}
			}else{
				$erro = "ID Invalido";
			}
			include('listar_produto.php');
			break;
	
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarProduto'])){
		
				//Trata nome
				$nome = utf8_decode($_POST['nome']);
				
				//Trata Descriзгo
				$descricao = utf8_decode($_POST['descricao']);
				
				//Trata Preзo
				$preco = $_POST['preco'];
				
				//Tratar Desconto
				$desconto = $_POST['desconto'];
				
				//Tratar ID da Categoria
				$categoria = $_POST['categoria'];
				
				//Tratar Ativo, se colocado qualquer valor й convertido em booleano: verdadeiro ou falso
				$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				//Tratar ID do Usuбrio
				$usuario = $_SESSION['idUsuario'];
				
				//Tratar Estoque
				$estoque = $_POST['estoque'];
				
				//Tratar Imagem
				$imagem = fopen($_FILES['imagem']['tmp_name'], 'rb');
				$conteudo = fread($imagem, filesize($_FILES['imagem']['tmp_name']));
				fclose($imagem);
				
				$stmt = odbc_prepare($db, "	UPDATE 
										Produto
									SET
										nomeProduto = ?,
										descProduto = ?,
										precProduto = ?,
										descontoPromocao = ?,
										idCategoria = ?,
										ativoProduto = ?,
										idUsuario = ?,
										qtdMinEstoque = ?,
										imagem = ?
									WHERE
										idProduto = $idProduto");
				
				
				if(odbc_execute($stmt, array($nome,
										$descricao,
										$preco,
										$desconto,
										$categoria,
										$ativo,
										$usuario,
										$estoque,
										$conteudo
										))){
					$msg = "Produto editado com sucesso!";
					include('listar_produto.php');
					break;					
				}else{
					$erro = "Erro ao editar produto!";
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

		case 'buscar':
		
			$nome = $_POST['nome'];
			
			$query = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto LIKE '%".$nome."%'");
			
			$produtos_encotrados = array();
			
			$i = 0;
				
			while($result = odbc_fetch_array($query)){
					$produtos_encotrados[$i] = $result;
					$i++;
			}
						
			include('listar_produto.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida!";
	}
	
}else{
	
	//Inseri um novo Produto
	if(isset($_POST['btnNovoProduto'])){
		
		//Trata nome
		$nome = utf8_decode($_POST['nome']);
		
		//Trata Descriзгo
		$descricao = utf8_decode($_POST['descricao']);
		
		//Trata Preзo
		$preco = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['preco']);
		
		//Tratar Desconto
		$desconto = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['desconto']);
		
		//Tratar ID da Categoria
		$categoria = $_POST['categoria'];
		
		//Tratar ID do Usuбrio
		$usuario = $_SESSION['idUsuario'];
		
		//Tratar Ativo, se colocado qualquer valor й convertido em booleano: verdadeiro ou falso
		$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
		$ativo = (bool) $_POST['ativo'];
		$ativo = $ativo === true ? 1 : 0;
		
		//Tratar Estoque
		$estoque = preg_replace("/[^a-z A-Z 0-9]+/", "", $_POST['estoque']);
		
		//Tratar Imagem
		$imagem = fopen($_FILES['imagem']['tmp_name'], 'rb');
		$conteudo = fread($imagem, filesize($_FILES['imagem']['tmp_name']));
		fclose($imagem);
		
		$stmt = odbc_prepare($db, "INSERT INTO produto
							(nomeProduto,
							descProduto,
							precProduto,
							descontoPromocao,
							idCategoria,
							ativoProduto,
							idUsuario,
							qtdMinEstoque,
							imagem)							
						VALUES
							(?,?,?,?,?,?,?,?,?)
							");
							
		if(odbc_execute($stmt, array($nome,
							$descricao,
							$preco,
							$desconto,
							$categoria,
							$ativo,
							$usuario,
							$estoque,
							$conteudo))){
			$msg = "Produto criado com sucesso!";
			
		include('listar_produto.php');
		}else{
			$erro = "Erro ao criar Produto!";
		}
		
	}
	
}

?>