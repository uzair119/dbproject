<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$pcode=$_POST['pcode'];
		mysqli_query($conn,"delete from PRODUCTS_13115 where PCODE='$pcode'");
	}
?>
