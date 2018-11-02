<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$id=$_POST['id'];
		$pass=$_POST['pass'];
		$sid=$_POST['sid'];
		$privilege=$_POST['privilege'];
		if($sid=="")
		{
			if(!mysqli_query($conn,"insert into USERS_13115(UID,PASSWORD,SID,PRIVILEGE) values ('$id', '$pass', NULL, $privilege)"))
				echo 'Failed to add. Make sure ID is unique';
		}
		else
		{
			if(!mysqli_query($conn,"insert into USERS_13115(UID,PASSWORD,SID,PRIVILEGE) values ('$id', '$pass','$sid',$privilege)"))
				echo 'Failed to add. Make sure ID is unique';
		}
	}
?>