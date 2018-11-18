<?php 
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");
include("addrestfunc.php");
$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;
include("includes/header.php");

if( !isset($_SESSION['user']) || $_SESSION['urole']==2) {
 header("Location: ./login.php");
 exit;
}




 ?>
<div id="homecontents">
<h1 class="mt-4 mb-3">Library
        <small>Add a new author</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo $rout->addMediaRoute ?>">Add item</a>
        </li>
        <li class="breadcrumb-item active">Add new author</li>
      </ol>



<a href="<?php echo $route->addrestRoute ?>"><button type="button" class="btn btn-primary btn-lg btn-block" href="<?php echo $route->addrestRoute ?>">Restaurant</button></a>
<hr>
<a href="<?php echo $route->addconcRoute ?>"><button type="button" class="btn btn-primary btn-lg btn-block" href="<?php echo $route->addrestRoute ?>">Concert</button></a>
<hr>
<a href="<?php echo $route->addthingRoute ?>"><button type="button" class="btn btn-primary btn-lg btn-block" href="<?php echo $route->addrestRoute ?>">Thing-to-do</button></a>
<hr>


</form>
</div>






 <?php include('includes/footer.php'); ?>