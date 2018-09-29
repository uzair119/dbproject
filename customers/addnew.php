<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$cid=$_POST['cid'];
		$sname=$_POST['sname'];
		$cname=$_POST['cname'];
		$cphone=$_POST['cphone'];
		$address=$_POST['address'];
		$area=$_POST['area'];
		$coord=$_POST['coord'];
		
		mysqli_query($conn,"insert into CUSTOMERS_13115 values ('$cid', '$sname','$cname','$cphone','$address','$area','$coord')");
	}
?>
