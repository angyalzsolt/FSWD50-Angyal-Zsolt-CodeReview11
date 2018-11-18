<?php
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;

if(!isset($_SESSION['user']) || $_SESSION['urole']==2){
	header("Location: <?php echo $route->loginRoute?>");
	exit;
}

$res=mysqli_query($conn, "SELECT * FROM user WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

include("includes/header.php");


 ?>

 <div id="homecontents">
 	



 

<h1>ADMIN PANEL</h1>
<h1>CONTROL EVERYTHING FROM HERE</h1>


Hey <h4><?php echo $userRow['userName'];  ?></h4>
            
           <a type="button" class="btn btn-secondary" href="<?php echo $route->logoutRoute?>?logout">Sign Out</a>




</div>





 <?php include('includes/footer.php'); ?>