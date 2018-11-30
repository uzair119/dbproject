<?php 
header('Content-Type: application/json');
	session_start();
	include ('conn.php');
	$query = mysqli_query($conn,"SELECT PCODE,SUM(QUANTITY) from INVOICE_13115 GROUP BY PCODE");
	while($row=mysqli_fetch_array($query))
		{
			$data[] = array(
				'PCODE' => $row['PCODE'],
				'QUANTITY' => $row['SUM(QUANTITY)']
			);
		}
		//$data = {"cols":$cols[],"rows":$rows[]};
	print json_encode($data);
?>
