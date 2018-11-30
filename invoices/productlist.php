<?php
	include('conn.php');
	$sql = "SELECT * FROM PRODUCTS_13115";
	$result = mysqli_query($conn, $sql);
	echo "<label>PRODUCT</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='PRODUCT'>";
	echo "<option value= ''>SELECT PRODUCT</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['PCODE'] ."'>" . $row['BRAND'] ."</option>";
	}
	echo "</select>";
?>



