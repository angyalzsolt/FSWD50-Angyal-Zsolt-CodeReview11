<?php
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );







include("dbconn.php");
include("runquerry.php");
include("routes.php");
include("../deletefunc.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;
$delete = new Delete;
include("header.php");

$delete->deleteItem();
//RESTAURANTS
$sql = "SELECT * FROM restaurant JOIN location ON restaurant.fk_location_id = location.location_id JOIN image ON location.fk_image_id = image.image_id";
$sql1 = "restaurant_name";
$sql2 = "restaurant_type";
$sql3 = "restaurant_tel_num";
$sql4 = "restaurant_shortdesc";
$sql5 = "restaurant_id";
$sql18 = "res";


//CONCERTS
$sql6 = "SELECT * FROM concert JOIN location ON concert.fk_location_id = location.location_id JOIN image ON location.fk_image_id = image.image_id";
$sql7 = "concert_name";
$sql8 = "concert_date";
$sql9 = "concert_time";
$sql10 = "concert_price";
$sql11 = "concert_id";
$sql19 = "con";

//THINGS-TO-DO

$x = new RunQuery;
$sql12 = "SELECT * FROM things_to_do JOIN location ON things_to_do.fk_location_id = location.location_id JOIN image ON location.fk_image_id = image.image_id";
$sql13 = "things_name";
$sql14 = "things_type";
$sql15 = "thing_shortdesc";
$sql16 = "thing_shortdesc";
$sql17 = "things_id";
$sql20 = "thing";




 ?>


 <h1 class="mt-4 mb-3">CodeReview11
        <small>List</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item active">List</li>
      </ol>


<h1>List</h1>





<h3>RESTAURANTS</h3>
<div class="card-deck">
   
    <?php $x->showCard($sql, $sql1, $sql2, $sql3, $sql4, $sql5, $sql18); ?>

</div>
<h3>CONCERTS</h3>
<div class="card-deck">
   
    <?php $x->showCard($sql6, $sql7, $sql8, $sql9, $sql10, $sql11, $sql19); ?>

</div>
<h3>Tihngs-to-do</h3>
<div class="card-deck">
   
    <?php $x->showCard($sql12, $sql13, $sql14, $sql15, $sql16, $sql17, $sql20); ?>

</div>

<?php include("footer.php") ?>