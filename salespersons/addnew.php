<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$sid=$_POST['sid'];
		$sname=$_POST['sname'];
		$cphone=$_POST['cphone'];
		$cid=$_POST['cid'];
		mysqli_query($conn, "INSERT INTO SALESPERSONS_IDS(SID) VALUES ('$sid')");
		if($cid == "")
		{
			if(!mysqli_query($conn,"insert into SALESPERSONS_13115(SID,NAME, CONTACT, CID) values ('$sid','$sname', '$cphone',NULL)"))
				echo 'Failed to add. Make sure ID is unique';
		}
		else
		{
			if(!mysqli_query($conn,"insert into SALESPERSONS_13115(SID,NAME, CONTACT, CID) values ('$sid','$sname', '$cphone','$cid')"))
				echo 'Failed to add. Make sure ID is unique';
		}
	}
?>
