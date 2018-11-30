<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$pcode=$_POST['pcode'];
		$query = mysqli_query($conn, "SELECT * FROM PRODUCTS_13115 WHERE PCODE = '$pcode'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$cid=$_POST['cid'];
		$query = mysqli_query($conn, "SELECT * FROM CUSTOMERS_13115 WHERE CID = '$cid'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

