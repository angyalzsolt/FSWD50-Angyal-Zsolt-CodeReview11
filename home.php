<?php
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;
include("includes/header.php");
if(!isset($_SESSION['user'])){
	header("Location: $route->loginRoute");
	exit;
}

$res=mysqli_query($conn, "SELECT * FROM user WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);




 ?>
<div id="homecontents">
	



<h1>HELLOKA</h1>


Hey <h4><?php echo $userRow['userName'];  ?></h4>
            
           <a type="button" class="btn btn-danger" href="<?php echo $route->logoutRoute?>?logout">Sign Out</a>


           <img src="">


</div>







 <?php include('includes/footer.php'); ?>