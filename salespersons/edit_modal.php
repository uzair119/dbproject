<div class="modal fade" id="edit<?php echo $urow['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from SALESPERSONS_13115 where ID='".$urow['ID']."'");
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
			ID:<input type="text" value="<?php echo $nrow['SID']; ?>" id="uid<?php echo $urow['ID']; ?>" class="form-control" disabled>
			SALESPERSON NAME: <input type="text" value="<?php echo $nrow['NAME']; ?>" id="usname<?php echo $urow['ID']; ?>" class="form-control">
			CONTACT: <input type="text" value="<?php echo $nrow['CONTACT']; ?>" id="ucphone<?php echo $urow['ID']; ?>" class="form-control">
			CUSTOMER ID: <input type="text" value="<?php echo $nrow['CID']; ?>" id="ucid<?php echo $urow['ID']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>
