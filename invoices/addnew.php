<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$invid=$_POST['invid'];
		$date=$_POST['date'];
		$cid=$_POST['cid'];
						
		if(!mysqli_query($conn,"insert into INVOICEHEADER_13115 values ('$invid', '$date','$cid')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$invid=$_POST['invid'];
		$pcode=$_POST['pcode'];
		$quantity=$_POST['quantity'];
		$discount=$_POST['discount'];
						
		if(!mysqli_query($conn,"insert into INVOICE_13115(INVID,PCODE,QUANTITY,DISCOUNT) values ('$invid', '$pcode','$quantity','$discount')"))
			echo "Failed to add.";
	}
?>
