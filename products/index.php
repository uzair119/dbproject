<?php
	include('conn.php');
	session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>Uzair Ahmed</title>
	</head>
<body>
	<ul>
  <li><a href="../home.php">Home</a></li>
  <li><a href="../customers/index.php">Customers</a></li>
  <li><a href="../salespersons/index.php">Salespersons</a></li>
  <li><a class = "active" href="../products/index.php">Products</a></li>
  <li><a href="../users/index.php">Users</a></li>
  <li><a href="../invoices/index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['user_session'];?></a></li>
</ul>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">PRODUCTS DATABASE</h2></center>
					<hr>
					<div id="userTable"></div>
					<div>
						<div class = "row">
						<div class = "col-md-4">
						</div>
						<div class = "col-md-4">
					<form  id = "addform" class = "form-horizontal">
						<div class = "form-group">
							<label>PRODUCT CODE</label>
							<input type  = "text" id = "pcode" class = "form-control">
						</div>
						<div class = "form-group">
							<label>BRAND</label>
							<input type  = "text" id = "brand" class = "form-control">
						</div>
						<div class = "form-group">
							<label>TYPE</label>
							<input type  = "text" id = "type" class = "form-control">
						</div>
						<div class = "form-group">
							<label>SHADE</label>
							<input type  = "text" id = "shade" class = "form-control">
						</div>
						<div class = "form-group">
							<label>SIZE</label>
							<input type  = "text" id = "size" class = "form-control">
						</div>
						<div class = "form-group">
							<label>PRICE</label>
							<input type  = "number" id = "price" class = "form-control">
						</div>
						<div class = "form-group">
							<button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div>
				</div>
				</div>
                </div>
            </div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		show();
		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#pcode').val()=="" || $('#brand').val()=="" || $('#type').val()=="" || $('#shade').val()=="" || $('#size').val()=="" || $('#price').val()==""){
				alert('Please input data first');
			}
			else{
			$pcode=$('#pcode').val();
			$brand=$('#brand').val();
			$type=$('#type').val();
			$shade=$('#shade').val();
			$size=$('#size').val();
			$price=$('#price').val();
			$coord=$('#coord').val();
			$('#addnew').html('Adding..');	
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						pcode: $pcode,
						type: $type,
						brand: $brand,
						shade: $shade,
						price: $price,
						size: $size,
						price: $price,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						show();
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$pcode=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						pcode: $pcode,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$upcode=$(this).val();
			$('#edit'+$upcode).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ubrand=$('#ubrand'+$upcode).val();
			$utype=$('#utype'+$upcode).val();
			$ushade=$('#ushade'+$upcode).val();
			$usize=$('#usize'+$upcode).val();
			$uprice=$('#uprice'+$upcode).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						pcode: $upcode,
						brand: $ubrand,
						type: $utype,
						shade: $ushade,
						price: $uprice,
						size: $usize,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	//display table
	function show(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
	#addform{

		padding: 20px 20px;
		border: 2px solid;
	}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}

li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: darkblue;
}
#logout-btn:hover{
	background-color: maroon;
}

.active {
    background-color: #0275d8;
}
.active:hover {
    background-color: darkblue;
    border-color: #419641;
}

</style>
</html>
