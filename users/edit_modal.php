<div class="modal fade" id="edit<?php echo $urow['UID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from USERS_13115 where UID='".$urow['UID']."'");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Update Row</h3></center>
		</div>
		<form class="form-inline">
		<div class="modal-body">
			ID: <input type="text" value="<?php echo $nrow['UID']; ?>" id="uid<?php echo $urow['UID']; ?>" class="form-control">
			PASSWORD: <input type="password" id="upass<?php echo $urow['UID']; ?>" class="form-control">
			SALESPERSON ID:<?php $sql = "SELECT * FROM SALESPERSONS_13115";
								$result = mysqli_query($conn, $sql);
								?>
							<select  type = "text" id = "usid<?php echo $urow['UID']; ?>" value = "<?php echo $nrow['SID']; ?>" class = "form-control">
							<option value= "">NOT ASSIGNED</option>
							<?php
								while ($row = mysqli_fetch_array($result)) {
    							echo "<option value='" . $row['SID'] ."'>" . $row['SID'] ."</option>";
									}
								echo "</select>";
								?>
			PRIVILEGE: <select type="text" value="<?php if($nrow['PRIVILEGE'] == 0) echo 'User'; else echo 'Admin'; ?>" id="uprivilege<?php echo $urow['UID']; ?>" class="form-control">
  									<option value="0">User</option>
  									<option value="1">Admin</option>
  							</select>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['UID']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>
