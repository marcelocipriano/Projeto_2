<?php

include('../auth/controle_de_acesso.php');
include('../db/index.php');

$q = odbc_exec($db, 'select * from usuario');
while($r = odbc_fetch_array($q){
	
	echo $r;
	
}


include('index.tpl.php');





?>