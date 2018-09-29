<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$pcode=$_POST['pcode'];
		$brand=$_POST['brand'];
		$type=$_POST['type'];
		$shade=$_POST['shade'];
		$size=$_POST['size'];
		$price=$_POST['price'];
		mysqli_query($conn,"UPDATE PRODUCTS_13115 SET PCODE='$pcode', BRAND='$brand', TYPE = '$type', SHADE = '$shade', SIZE = '$size', PRICE = $price WHERE PCODE ='$pcode'");
	}
?>
