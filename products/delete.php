<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$pcode=$_POST['pcode'];
		if(!mysqli_query($conn,"delete from PRODUCTS_13115 where PCODE='$pcode'"))
			echo "The product cannot be deleted unless you remove it from the invoices.";
	}
?>
