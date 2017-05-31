<?php
	include('../menu/index.tpl.php');
	include('../menu/head.tpl.php');

?>

<br><table width="100%" border="1">
	<tr>
		<td bgcolor="gray">ID Categoria</td>
		<td bgcolor="gray">Categoria</td>
		<td bgcolor="gray">Descrição</td>
		<td bgcolor="gray">Editar</td>
		<td bgcolor="gray">Apagar</td>
		<td bgcolor="gray"><a href='incluir_categoria.php'>Nova Categoria</a></td>
	</tr>

<?php

include ('../db/index.php');

if(isset($erro)){
		echo "<center>$erro</center";
	}

	if (isset($msg)){
		echo "<center>$msg</center";

	}

$query = odbc_exec($db, 'SELECT * FROM categoria');	
	
	while ($result = odbc_fetch_array($query)){
		
		echo " <tr>
				<td>{$result['idCategoria']}</td>
				<td>{$result['nomeCategoria']}</td>
				<td>{$result['descCategoria']}</td>
				<td><a href='index.php?acao=editar&id={$result['idCategoria']}'>Editar</a></td>
				<td><a href='index.php?acao=excluir&id={$result['idCategoria']}'>Excluir</a></td>
			</tr>";
	}

?>
</table><br><br>
<center><a href='../logout'>Sair</a></center>