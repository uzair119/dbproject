<?php

	$database_host = "localhost";
	$database_user = "root";
	$database_password = "";
	$database_name = "Uzair";
	
	try{
		
		$db_con = new PDO("mysql:host={$database_host};dbname={$database_name}",$database_user,$database_password);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $display_message){
		echo $display_message->getMessage();
	}

?>
