<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>SHOP NAME</th>
				<th>CUSTOMER NAME</th>
				<th>CUSTOMER PHONE</th>
				<th>ADDRESS</th>
				<th>AREA</th>
				<th>COORDINATES</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM CUSTOMERS_13115');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['CID']; ?></td>
									<td><?php echo $urow['SNAME']; ?></td>
									<td><?php echo $urow['CNAME']; ?></td>
									<td><?php echo $urow['CNO']; ?></td>
									<td><?php echo $urow['AREA']; ?></td>
									<td><?php echo $urow['ADDRESS']; ?></td>
									<td><?php echo $urow['GC']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['CID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['CID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
