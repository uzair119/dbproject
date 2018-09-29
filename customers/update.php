<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$cid=$_POST['cid'];
		$sname=$_POST['sname'];
		$cname=$_POST['cname'];
		$cphone=$_POST['cphone'];
		$address=$_POST['address'];
		$area=$_POST['area'];
		$coord=$_POST['coord'];
		mysqli_query($conn,"UPDATE CUSTOMERS_13115 SET CID='$cid', SNAME='$sname', CNAME = '$cname', CNO = '$cphone', ADDRESS = '$address', AREA = '$area', GC = '$coord' WHERE CID ='$cid'");
	}
?>
