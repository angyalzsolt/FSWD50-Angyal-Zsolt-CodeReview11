<?php
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");
include("includes/runquerry.php");

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

$x= new RunQuery;
$sql = "SELECT * FROM restaurant JOIN location ON restaurant.fk_location_id = location.location_id JOIN image ON location.fk_image_id = image.image_id";
$sql1 = "restaurant_name";
$sql2 = "restaurant_type";
$sql3 = "restaurant_tel_num";
$sql4 = "restaurant_shortdesc";
$sql5 = "restaurant_id";
$sql18 = "res";



 ?>


<h1 class="mt-4 mb-3">CodeReview11
        <small>Restaurants</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Restaurants</li>
      </ol>

<h1>HELLOKA</h1>


Hey <h4><?php echo $userRow['userName'];  ?></h4>
            
           <a type="button" class="btn btn-secondary" href="<?php echo $route->logoutRoute?>?logout">Sign Out</a>


           <h3>RESTAURANTS</h3>
<div class="card-deck">
   
    <?php $x->showCard($sql, $sql1, $sql2, $sql3, $sql4, $sql5, $sql18); ?>

</div>







<?php include('includes/footer.php'); ?>