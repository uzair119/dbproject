<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$id=$_POST['id'];
		$pass=$_POST['pass'];
		$sid=$_POST['sid'];
		$privilege=$_POST['privilege'];
		if($sid=="")
			mysqli_query($conn,"insert into USERS_13115(UID,PASSWORD,SID,PRIVILEGE) values ('$id', '$pass', NULL, $privilege)");
		else
			mysqli_query($conn,"insert into USERS_13115(UID,PASSWORD,SID,PRIVILEGE) values ('$id', '$pass','$sid',$privilege)");
	}
?>