<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>INVOICE ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>ADDRESS</th>
				<th>AREA</th>
				<th>GC</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$cid = $_POST['cid'];
					$invid = $_POST['invid'];
					if($cid != "" || $invid != "" || $invid != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM INVOICEHEADER_13115 WHERE INVID = '$invid'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM CUSTOMERS_13115 WHERE CID = '$cid'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['INVID'];?> </td>
									<td><?php echo $invrow['DATE'];?> </td>
									<td><?php echo $invrow['CID'];?> </td>
									<td><?php echo $urow['CNAME']; ?></td>
									<td><?php echo $urow['ADDRESS']; ?></td>
									<td><?php echo $urow['AREA']; ?></td>
									<td><?php echo $urow['GC']; ?></td>
									<td > <button class="btn btn-danger delete" value="<?php echo $invrow['INVID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 class = "text-primary">INVOICE</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>INVOICE ID</th>
				<th>PRODUCT</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>DISCOUNT(%)</th>
				<th>TOTAL</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.INVID, P.BRAND, P.PRICE, I.QUANTITY, I.DISCOUNT, round((100-I.DISCOUNT)/100*(I.QUANTITY*P.PRICE)) AS TOTAL FROM INVOICE_13115 I, PRODUCTS_13115 P WHERE I.INVID = '$invid' AND I.PCODE = P.PCODE");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['INVID']; ?></td>
									<td><?php echo $urow['BRAND']; ?></td>
									<td><?php echo $urow['PRICE']; ?></td>
									<td><?php echo $urow['QUANTITY']; ?></td>
									<td><?php echo $urow['DISCOUNT']; ?></td>
									<td><?php echo $urow['TOTAL']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}
?>
