<?php

    $mysql_host="localhost";
	$mysql_user="root";
	$mysql_pass="";

	$mysql_db="499";

	$dbcon=new mysqli($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

	if(!$dbcon){
		die(mysql_error());
	}
?>
