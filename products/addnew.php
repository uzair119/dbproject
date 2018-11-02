<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$pcode=$_POST['pcode'];
		$brand=$_POST['brand'];
		$type=$_POST['type'];
		$shade=$_POST['shade'];
		$size=$_POST['size'];
		$price=$_POST['price'];
				
		if(!mysqli_query($conn,"insert into PRODUCTS_13115 values ('$pcode', '$brand','$type','$shade','$size',$price)"))
			echo 'Failed to add. Make sure product code is unique';
	}
?>
