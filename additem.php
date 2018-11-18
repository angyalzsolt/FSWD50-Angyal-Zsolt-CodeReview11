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
?>
<h1 class="mt-4 mb-3">Library
        <small>Add a new item</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Store</li>
    </ol>


<h3>Restaurant</h3>
<?php 
$order= "SELECT * FROM restaurant";
$first = "restaurant_id";
$second = "restaurant_name";
$third = "restaurant_type";
$id= "addrestaurant";
$id2="restaurantadd";
$x = new RunQuery;
$x->getData($order, $first, $second, $third, $id, $id2);
$order1= "SELECT restaurant_name FROM restaurant WHERE restaurant_name = '$name'";
$order2 = "INSERT INTO `restaurant` (`restaurant_name`) VALUES ('$name')";
$x->addData($second, $third, $order1, $order2, $id, $id2);

 ?>
<!--
<h3>Concert</h3>
<?php 
$order= "SELECT * FROM concert";
$first = "concert_id";
$second = "concert_name";
$third = "concert";
$x = new RunQuery;
$x->getData($order, $first, $second, $third);
$x->addData($first, $third);
 ?>

<h3>Things to do</h3>
 <?php 
$order= "SELECT * FROM things_to_do";
$first = "things_id";
$second = "things_name";
$third = "things_type";
$x = new RunQuery;
$x->getData($order, $first, $second, $third);
$x->addData($first, $third);
 ?>
-->




<?php include("includes/footer.php") ?>