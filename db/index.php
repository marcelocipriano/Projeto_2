<?php

$db_host = "delta-pi.database.windows.net";

$db_name = "delta";

$user = "TSI";

$password = "SistemasInternet123";


$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect(	$dsn, $user, $password)){
	echo "N�o foi poss�vel acessar o banco de dados";
	exit;
}
?>