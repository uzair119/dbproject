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
		
		if(!mysqli_query($conn,"insert into CUSTOMERS_13115 values ('$cid', '$sname','$cname','$cphone','$address','$area','$coord')"))
			echo 'Failed to add. Make sure your ID field is unique.';
	}
?>
