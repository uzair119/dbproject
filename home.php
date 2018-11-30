<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'conn.php';


$uid = $_SESSION['user_session'];
$q=mysqli_query($conn,"SELECT * FROM USERS_13115 WHERE UID='$uid'");
$row=mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html>
<title>Uzair Ahmed</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-content" style="max-width:1366px">

<!-- First Grid: Logo & About -->
  <div class="w3-full w3-black w3-container w3-center" >
        <div class="w3-padding-64" style = "margin-bottom:-50px"; >
          <?php include('chart.php'); ?>

      <h1>Hello! <?php echo $row['UID']; ?></h1>
    </div>
    <div class="w3-padding-10">
      <a href="./home.php" class="w3-button w3-black w3-block w3-hover-blue-grey w3-padding-16">Home</a>
      <a href="./customers/index.php" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">Customers</a>
      <a href="./salespersons/index.php" class="w3-button w3-black w3-block w3-hover-dark-grey w3-padding-16">Salespersons</a>
      <a href="./products/index.php" class="w3-button w3-black w3-block w3-hover-brown w3-padding-16">Products</a>
      <a href="./users/index.php" class="w3-button w3-black w3-block w3-hover-green w3-padding-16">Users</a>
      <a href="./invoices/index.php" class="w3-button w3-black w3-block w3-hover-orange w3-padding-16">Invoices</a>
       <a href="./survey.php" class="w3-button w3-black w3-block w3-hover-indigo w3-padding-16">Surveys</a>
      <a href="./logout.php" class="w3-button w3-black w3-block w3-hover-red w3-padding-16">Logout</a>
    </div>
  </div>
  

</body>
</html>
