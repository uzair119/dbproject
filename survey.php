<?php 
	session_start();
	require_once('conn.php');
	require_once('vendor/autoload.php');

	
    
	if(!isset($_SESSION['user_session']))
	{
		header("Location: index.php");
	}

	$client = new MongoDB\Client;
	$database = $client->selectDatabase('uzair');
	$collection = $database->selectCollection('survey');
	if (isset($_POST['create']))
	{
		$target_dir = "./upload/";
		$target_file = $target_dir.$_FILES["image"]["name"]; //Image:<input type="file" id="image" name="image">
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
		$data = [
			'coordinates' => $_POST['coordinates'],
			'shopName' => $_POST['shopName'],
			'available' => $_POST['available'],
			'front' => $_POST['front'],
			'competitor' => $_POST['competitor'],
			'timestamp' => new MongoDB\BSON\UTCDateTime,
			'image' => $_FILES['image']['name']
		];
		//$tag = $_REQUEST['username'];
			}
			else
			{
				echo 'FILE NOT MOVED!';
				echo '<br>';
				echo $_FILES['image']['tmp_name'];
				echo '<br>';
			    echo $_FILES['image']['name'];
			    echo '<br>';
			    echo $target_file;
			    echo '<br>';
			}
				
		$result = $collection->insertOne($data);
		if($result->getInsertedCount() > 0)
		{
			$_SESSION['success_msg'] = "Form submitted";
			header('location: survey.php');
		}
		else {
			$_SESSION['error_msg'] = "Failed to submit";
			header('location: survey.php');
		}
	}
	if (isset($_GET['delete']))
	{
		$filter = ['_id' => new MongoDB\BSON\ObjectId($_GET['delete'])];
		$form = $collection->findOne($filter);
		if (!$form)
		{
			$_SESSION['error_msg'] = "Form not found";
			header('location: survey.php');
		}
		$filename = 'upload/'.$form['image'];
		if (file_exists($filename))
		{
			if (!unlink($filename))
			{
				//$_SESSION['error_msg'] = "Unable to delete file";
				//header('location: survey.php');
			}
		}
		$result = $collection->deleteOne($filter);
		if ($result->getDeletedCount() > 0)
		{
			$_SESSION['success_msg'] = "Form Deleted";
			header('location: survey.php');
		}
		else
		{
			$_SESSION['error_msg'] = "An error occurred";
			header('location: survey.php');
		}
	}
	if (isset($_SESSION['success_msg']))
    {
        echo '<br><br><div class="bg bg-success">';
        echo '<b>'; echo $_SESSION['success_msg']; echo '</b>';
        unset($_SESSION['success_msg']);
        echo '
        </div>';
    }
	if (isset($_SESSION['error_msg']))
	{
        echo '<br><br><div class="bg bg-danger">';
        echo '<b>'; echo $_SESSION['error_msg']; echo '</b>';
        unset($_SESSION['error_msg']);
        echo '
        </div>';
	}
	?>
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

<head>
		<link rel = "stylesheet" type = "text/css" href = "bootstrap.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title>Uzair Ahmed</title>
	</head>
<body>
	<ul>
  <li><a href="./home.php">Home</a></li>
  <li><a href="./customers/index.php">Customers</a></li>
  <li><a href="./salespersons/index.php">Salespersons</a></li>
  <li><a href="./products/index.php">Products</a></li>
  <li><a href="./users/index.php">Users</a></li>
  <li><a href="./invoices/index.php">Invoices</a></li>
  <li><a href="./survey.php">Surveys</a></li>
  <li style="float:right"><a id = "logout-btn" href="./logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['user_session'];?></a></li>
</ul>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                 <center><h1 class = "text-primary">SURVEYS</h1></center>
                 
	<?php
	$forms = $collection->find();
	foreach($forms as $key => $form){
		$UTCDateTime = new MongoDB\BSON\UTCDateTime((string)$form['timestamp']);
		$DateTime = $UTCDateTime->toDateTime();

echo '
		
	<div class="w3-panel w3-border w3-border-blue" style = "padding-bottom:20px">
		<div class = "rows">
		 <center><h2 class = "text-primary">'.$DateTime->format('d/m/Y H:i:s').'</h2></center>
				
				<div class = "rows">
				<center><div ><img class = "w3-border w3-padding" style = "max-width: 480px" src="upload/'.$form['image'].'">
				</div></center>
					<div class ="col-md-8">
					<hr>
						<b>'.$form['shopName'].'</b>
						<p>Coordinates: '.$form['coordinates'].'</p>
						<p>Are my products available in shop? : '.$form['available'].'</p>
						<p>Are my products positioned in front? : '.$form['front'].'</p>
						<p>Are competitor products more prominent? : '.$form['competitor'].'</p>
					</div>
					

					<div class = "col-md-1 w3-btn w3-red"><a href ="survey.php?delete='.$form['_id'].'">Delete</a></div>
					</div>
				</div>
				</div>
				<hr>';
	} 
	?>






<div class="w3-panel w3-border w3-border-blue">
<form action = "survey.php" method="post" class="form-horizontal" enctype="multipart/form-data">
 	
<hr>
	<center><h1 class = "text-primary">ADD NEW SURVEY</h1></center>
	<div class = "form-group">
		<label>Geographical Coordinates</label>
		<input type="text" name="coordinates" class="form-control" >
	</div>
	<div class = "form-group">
		<label>Shop Name</label>
		<input type="text" name="shopName" class="form-control">
	</div>

	<div class = "form-group">
		<label>Products Available?</label>
		<input type="radio" name="available" value="Yes">Yes   
		<input type="radio" name="available" value="No"> No
	</div>

	<div class = "form-group">
		<label>Products positioned in front?</label>
		<input type="radio" name="front" value="Yes">Yes
		<input type="radio" name="front" value="No">No
	</div>

	<div class = "form-group">
		<label>Are competitor products positioned in front?</label>
		<input type="radio" name="competitor" value="Yes">Yes
		<input type="radio" name="competitor" value="No">No
	</div>

	<div class = "form-group">
		<label>Attach Image:</label>
		<input type="file" name="image" class="w3-btn w3-ripple w3-blue" required>
	</div>

	<input type="submit" name="create" value="Insert" class="w3-button w3-block w3-teal">
</div>
</div>
</div>
</div>
</div>
<?php 
	echo '
	
</form>
</div>
';
?>
