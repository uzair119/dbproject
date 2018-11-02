<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from INVOICE_13115 where INVID='$id'");
		mysqli_query($conn,"delete from INVOICEHEADER_13115 where INVID='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from INVOICE_13115 where ID='$id'");
	}
?>
