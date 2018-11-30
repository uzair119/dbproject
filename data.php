<?php 
header('Content-Type: application/json');
	session_start();
	include ('conn.php');
	$query = mysqli_query($conn,"SELECT P.BRAND,SUM(I.QUANTITY) AS QUANTITY from INVOICE_13115 I, PRODUCTS_13115 P  WHERE P.PCODE = I.PCODE GROUP BY P.BRAND");
	while($row=mysqli_fetch_array($query))
		{
			$data[] = array(
				'PCODE' => $row['BRAND'],
				'QUANTITY' => $row['QUANTITY']
			);
		}
		//$data = {"cols":$cols[],"rows":$rows[]};
	print json_encode($data);
?>
