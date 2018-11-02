<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>USER ID</th>
				<th>ACTIVE</th>
				<th>SALSEPERSON ID</th>
				<th>PRIVILEGE</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM USERS_13115');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['UID']; ?></td>
									<?php if ($urow['ACTIVE'] == '1') echo '<td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td>'; else echo '<td></td>' ?>
									<td><?php echo $urow['SID']; ?></td>
									<td><?php if ($urow['PRIVILEGE']==1)  echo 'ADMIN'; else echo 'USER'; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['UID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['UID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
