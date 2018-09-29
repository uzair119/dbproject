<?php
	session_start();
	require_once 'conn.php';

	if(isset($_POST['btn-login']))
	{
		$user_id = trim($_POST['user_id']);
		$user_password = trim($_POST['password']);
		
		$password = ($user_password);

		$q = mysqli_query($conn,"SELECT * FROM USERS_13115 WHERE UID = '$user_id'");
		$row = mysqli_fetch_array($q);
		if($row['PASSWORD']==$password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['UID'];
				mysqli_query($conn,"UPDATE USERS_13115 SET ACTIVE = '1' WHERE UID = '$user_id'");
			}
			else{
				echo "Email or password does not exist."; // wrong details 
			}
		
	}
?>
