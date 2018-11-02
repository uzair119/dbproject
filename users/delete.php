<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		//mysqli_query($conn,"UPDATE USERS_13115 SET SID=NULL WHERE UID = $id");
		if(!mysqli_query($conn,"delete from USERS_13115 where UID='$id'"))
			echo 'Failed to delete.';
	}
?>
