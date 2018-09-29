<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>SALESPERSON NAME</th>
				<th>CONTACT</th>
				<th>ASSIGNED CUSTOMER ID</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM SALESPERSONS_13115');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['SID']; ?></td>
									<td><?php echo $urow['NAME']; ?></td>
									<td><?php echo $urow['CONTACT']; ?></td>
									<td><?php echo $urow['CID']; ?></td>
									<td style = "width: 200px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
