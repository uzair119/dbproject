<?php
	session_start();
	include('conn.php');
	$user_id = $_SESSION['user_session'];
	mysqli_query($conn,"UPDATE USERS_13115 SET ACTIVE = '0' WHERE UID = '$user_id'");
	unset($_SESSION['user_session']);
	
	if(session_destroy())
	{
		header("Location: index.php");
	}
?>