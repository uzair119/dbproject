<div class="modal fade" id="edit<?php echo $urow['CID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from CUSTOMERS_13115 where CID='".$urow['CID']."'");
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
			ID: <input type="text" value="<?php echo $nrow['CID']; ?>" id="uid<?php echo $urow['CID']; ?>" class="form-control">
			SELLER NAME: <input type="text" value="<?php echo $nrow['SNAME']; ?>" id="usname<?php echo $urow['CID']; ?>" class="form-control">
			CUSTOMER NAME: <input type="text" value="<?php echo $nrow['CNAME']; ?>" id="ucname<?php echo $urow['CID']; ?>" class="form-control">
			CUSTOMER PHONE: <input type="text" value="<?php echo $nrow['CNO']; ?>" id="ucphone<?php echo $urow['CID']; ?>" class="form-control">
			ADDRESS: <input type="text" value="<?php echo $nrow['ADDRESS']; ?>" id="uaddress<?php echo $urow['CID']; ?>" class="form-control">
			AREA: <input type="text" value="<?php echo $nrow['AREA']; ?>" id="uarea<?php echo $urow['CID']; ?>" class="form-control">
			COORDINATES: <input type="text" value="<?php echo $nrow['GC']; ?>" id="ucoord<?php echo $urow['CID']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['CID']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>
