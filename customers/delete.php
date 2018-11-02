<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		if(!mysqli_query($conn,"delete from CUSTOMERS_13115 where CID='$id'"))
			echo 'Cannot delete. The customer is assigned to a salesperson.';
	}
?>
