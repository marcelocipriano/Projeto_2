<?php
	ini_set ('odbc.defaultlrl', 9000000);
	include('../menu/index.tpl.php');
?>

<br><br><center><table width="90%">
	<tr height="10px">
		<th bgcolor="gray">Produto</th>
		<th bgcolor="gray">Nome</th>		
		<th bgcolor="gray">Descrição</th>
		<th bgcolor="gray">Preço</th>
		<th bgcolor="gray">Promoção</th>
		<th bgcolor="gray">Estoque</th>
		<th bgcolor="gray">Editar</th>
		<th bgcolor="gray">Apagar</th>
		<th bgcolor="gray"><a href='incluir_produto.php'>+ Novo Produto</a></th>
	</tr>
<?php

include ('../db/index.php');

if(isset($erro)){
		echo "<center style='color:#69BE28'>$erro</center><br>";
	}

	if (isset($msg)){
		echo "<center style='color:#69BE28'>$msg</center><br>";

	}

	if(isset($_POST['buscar'])){
	
							$i = 0;
		$query2 = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto LIKE '%".$nome."%'");

							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}


			while ($result = odbc_fetch_array($query2)){
				
				echo " <tr bgcolor=".$cor." align='center'>
				<td><img width='200px' src=\"data:image/jpeg;base64,".base64_encode($result['imagem'])."\"/></td>
				<td>{$result['nomeProduto']}</td>
				<td>{$result['descProduto']}</td>
				<td>{$result['precProduto']}</td>
				<td>{$result['descontoPromocao']}</td>
				<td>{$result['qtdMinEstoque']}</td>
				<td><a href='index.php?acao=editar&id={$result['idProduto']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
				<td><a href='index.php?acao=excluir&id={$result['idProduto']}'><i style='color:black' class='fa fa-trash-o' aria-hidden='true'></i></a></td>
			</tr>";
				
			}
		
	
		
	}elseif(isset($_POST['btnNovoProduto']) || isset($_POST['btnGravarProduto'])){
	
		$query = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto = '$nome' AND descProduto = '$descricao' AND precProduto = '$preco'");	
							$i = 0;
		while ($result = odbc_fetch_array($query)){

							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}
			
			echo " <tr bgcolor=".$cor." align='center'>
				<td><img width='200px' src=\"data:image/jpeg;base64,".base64_encode($result['imagem'])."\"/></td>
				<td>{$result['nomeProduto']}</td>
				<td>{$result['descProduto']}</td>
				<td>{$result['precProduto']}</td>
				<td>{$result['descontoPromocao']}</td>
				<td>{$result['qtdMinEstoque']}</td>
				<td><a href='index.php?acao=editar&id={$result['idProduto']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
				<td><a href='index.php?acao=excluir&id={$result['idProduto']}'><i style='color:black' class='fa fa-trash-o' aria-hidden='true'></i></a></td>
				</tr>";
		
		}
	}
	else{

		$query = odbc_exec($db, 'SELECT * FROM produto');	
	
							$i = 0;

	while ($result = odbc_fetch_array($query)){

							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}
		
		echo " <tr bgcolor=".$cor." align='center'>
				<td><img width='200px' src=\"data:image/jpeg;base64,".base64_encode($result['imagem'])."\"/></td>
				<td>{$result['nomeProduto']}</td>
				<td>{$result['descProduto']}</td>
				<td>{$result['precProduto']}</td>
				<td>{$result['descontoPromocao']}</td>
				<td>{$result['qtdMinEstoque']}</td>
				<td><a href='index.php?acao=editar&id={$result['idProduto']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
				<td><a href='index.php?acao=excluir&id={$result['idProduto']}'><i style='color:black' class='fa fa-trash-o' aria-hidden='true'></i></a></td>
			</tr>";
	}
}
?>
</table></center>