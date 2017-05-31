<?php
	include('../menu/index.tpl.php');
	include('../menu/head.tpl.php');

?>

<br><table width="100%" border="1">
	<tr>
		<td bgcolor="gray">ID Usuario</td>
		<td bgcolor="gray">Produto</td>
		<td bgcolor="gray">Descrição</td>
		<td bgcolor="gray">Preço</td>
		<td bgcolor="gray">Promoção</td>
		<td bgcolor="gray">Categoria</td>
		<td bgcolor="gray">Ativo</td>
		<td bgcolor="gray">Usuário</td>
		<td bgcolor="gray">Estoque</td>
		<td bgcolor="gray">Editar</td>
		<td bgcolor="gray">Apagar</td>
		<td bgcolor="gray"><a href='incluir_produto.php'>Novo Produto</a></td>
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
	
	
		

			while ($result = odbc_fetch_array($query2)){
				
				echo " <tr>
				<td>{$result['idProduto']}</td>
				<td>{$result['nomeProduto']}</td>
				<td>{$result['descProduto']}</td>
				<td>{$result['precProduto']}</td>
				<td>{$result['descontoPromocao']}</td>
				<td>{$result['idCategoria']}</td>
				<td>{$result['ativoProduto']}</td>
				<td>{$result['idUsuario']}</td>
				<td>{$result['qtdMinEstoque']}</td>
				<td><img width='130%' src=\"data:image/jpeg;base64,".base64_encode($result['imagem'])."\"/></td>
				<td><a href='index.php?acao=editar&id={$result['idProduto']}'>Editar</a></td>
				<td><a href='index.php?acao=excluir&id={$result['idProduto']}'>Excluir</a></td>
			</tr>";
				
			}
		
	
		
	}else{

		$query = odbc_exec($db, 'SELECT * FROM produto');	
	
	while ($result = odbc_fetch_array($query)){
		
		echo " <tr>
				<td>{$result['idProduto']}</td>
				<td>{$result['nomeProduto']}</td>
				<td>{$result['descProduto']}</td>
				<td>{$result['precProduto']}</td>
				<td>{$result['descontoPromocao']}</td>
				<td>{$result['idCategoria']}</td>
				<td>{$result['ativoProduto']}</td>
				<td>{$result['idUsuario']}</td>
				<td>{$result['qtdMinEstoque']}</td>
				<td><img width='130%' src=\"data:image/jpeg;base64,".base64_encode($result['imagem'])."\"/></td>
				<td><a href='index.php?acao=editar&id={$result['idProduto']}'>Editar</a></td>
				<td><a href='index.php?acao=excluir&id={$result['idProduto']}'>Excluir</a></td>
			</tr>";
	}
}
?>
</table><br><br>
<center><a href='../logout'>Sair</a></center>