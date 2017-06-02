<?php
	include('../menu/index.tpl.php');
?>

<br><table width="80%">
	<tr>
		<th bgcolor="gray">Categoria</th>
		<th bgcolor="gray">Descrição</th>
		<th bgcolor="gray">Editar</th>
		<th bgcolor="gray">Apagar</th>
		<th bgcolor="gray"><a href='incluir_categoria.php'>+ Nova Categoria</a></th>
	</tr>

<?php

include ('../db/index.php');

if(isset($erro)){
		echo "<center style='color:#69BE28'>$erro</center><br>";
	}

	if (isset($msg)){
		echo "<center style='color:#69BE28'>$msg</center><br>";

	}

$query = odbc_exec($db, 'SELECT * FROM categoria');	
	
							$i = 0;

	while ($result = odbc_fetch_array($query)){
		
							$i++;

     						if ($i % 2 == 0){
        						$cor = "#EBEBEB";
        					}else{ 
        						$cor = "#CCCCCC";
        					}		


		echo " <tr bgcolor=".$cor.">
				<td>{$result['nomeCategoria']}</td>
				<td>{$result['descCategoria']}</td>
				<td><a href='index.php?acao=editar&id={$result['idCategoria']}'>Editar</a></td>
				<td><a href='index.php?acao=excluir&id={$result['idCategoria']}'>Excluir</a></td>
			</tr>";
	}

?>
</table><br><br>