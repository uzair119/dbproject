<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		$sid=$_POST['sid'];
		mysqli_query($conn,"delete from SALESPERSONS_13115 where ID=$id");
		mysqli_query($conn,"delete from SALESPERSONS_IDS WHERE SID='$sid'");
	}
?>
