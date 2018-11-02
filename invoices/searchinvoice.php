<?php
	include('conn.php');
	$cid = $_POST['searchid'];
	$sql = "SELECT * FROM INVOICEHEADER_13115 WHERE CID = '$cid'";
	$result = mysqli_query($conn, $sql);
	echo "<label>INVOICE ID</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='CUSTOMER ID'>";
	echo "<option value= ''>SELECT INVOICE</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['INVID'] ."'>" . $row['INVID'] ."</option>";
	}
	echo "</select>";
?>


