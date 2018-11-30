<?php 
header('Content-Type: application/json');
	session_start();
	include ('conn.php');
	$query = mysqli_query($conn,"SELECT IH.CID,SUM(P.PRICE*I.QUANTITY) AS TOTAL from INVOICE_13115 I, INVOICEHEADER_13115 IH, PRODUCTS_13115 P WHERE I.INVID = IH.INVID AND I.PCODE = P.PCODE GROUP BY IH.CID");
	while($row=mysqli_fetch_array($query))
		{
			$data[] = array(
				'CID' => $row['CID'],
				'TOTAL' => $row['TOTAL']
			);
		}
		//$data = {"cols":$cols[],"rows":$rows[]};
	print json_encode($data);
?>
