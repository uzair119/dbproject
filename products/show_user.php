<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>PRODUCT CODE</th>
				<th>BRAND</th>
				<th>TYPE</th>
				<th>SHADE</th>
				<th>SIZE</th>
				<th>PRICE</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM PRODUCTS_13115');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['PCODE']; ?></td>
									<td><?php echo $urow['BRAND']; ?></td>
									<td><?php echo $urow['TYPE']; ?></td>
									<td><?php echo $urow['SHADE']; ?></td>
									<td><?php echo $urow['SIZE']; ?></td>
									<td><?php echo $urow['PRICE']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['PCODE']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['PCODE']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
