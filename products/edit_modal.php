<div class="modal fade" id="edit<?php echo $urow['PCODE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from PRODUCTS_13115 where PCODE='".$urow['PCODE']."'");
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
			PRODUCT CODE: <input type="text" value="<?php echo $nrow['PCODE']; ?>" id="upcode<?php echo $urow['PCODE']; ?>" class="form-control">
			BRAND: <input type="text" value="<?php echo $nrow['BRAND']; ?>" id="ubrand<?php echo $urow['PCODE']; ?>" class="form-control">
			TYPE: <input type="text" value="<?php echo $nrow['TYPE']; ?>" id="utype<?php echo $urow['PCODE']; ?>" class="form-control">
			SHADE: <input type="text" value="<?php echo $nrow['SHADE']; ?>" id="ushade<?php echo $urow['PCODE']; ?>" class="form-control">
			SIZE: <input type="text" value="<?php echo $nrow['SIZE']; ?>" id="usize<?php echo $urow['PCODE']; ?>" class="form-control">
			PRICE: <input type="text" value="<?php echo $nrow['PRICE']; ?>" id="uprice<?php echo $urow['PCODE']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['PCODE']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>
