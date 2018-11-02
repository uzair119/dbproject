<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$quantity=$_POST['discount'];
		$discount=$_POST['quantity'];
		mysqli_query($conn,"UPDATE INVOICE_13115 SET QUANTITY='$quantity', DISCOUNT='$discount' WHERE id ='$id'");
	}
?>
