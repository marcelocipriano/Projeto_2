<?php
	include('../menu/index.tpl.php');
?>

<br><br><center><table width="80%">
	<tr height="20px" style="color:black">
		<th bgcolor="gray">Categoria</th>
		<th bgcolor="gray">Descrição</th>
		<th bgcolor="gray">Editar</th>
		<th bgcolor="gray">Apagar</th>
		<th width="100px"><button><b><a style="bgcolor:gray; text-decoration:none; color:#69BE28" href='incluir_categoria.php'>Criar Categoria</a></b></button></th>
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


		echo " <tr bgcolor=".$cor." align='center'>
				<td>".utf8_encode($result['nomeCategoria'])."</td>
				<td>".utf8_encode($result['descCategoria'])."</td>
				<td><a href='index.php?acao=editar&id={$result['idCategoria']}'><i style='color:black' class='fa fa-pencil' aria-hidden='true'></i></a></td>
				<td><a href='index.php?acao=excluir&id={$result['idCategoria']}'><i style='color:black'class='fa fa-trash-o' aria-hidden='true'></i></a></td>
			</tr>";
	}

?>
</table></center>