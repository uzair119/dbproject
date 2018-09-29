<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$sname=$_POST['sname'];
		$cphone=$_POST['cphone'];
		$cid=$_POST['cid'];
		if($cid == "")
			mysqli_query($conn,"UPDATE SALESPERSONS_13115 SET  NAME='$sname', CONTACT = '$cphone', CID = NULL WHERE ID =$id");
		else
			mysqli_query($conn,"UPDATE SALESPERSONS_13115 SET  NAME='$sname', CONTACT = '$cphone', CID = '$cid' WHERE ID =$id");
	}
?>
