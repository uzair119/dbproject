<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$pass=$_POST['pass'];
		$sid=$_POST['sid'];
		$privilege=$_POST['privilege'];
		
		mysqli_query($conn,"UPDATE USERS_13115 SET PASSWORD='$pass', SID = '$sid', PRIVILEGE = $privilege WHERE UID ='$id'");
	}
?>
