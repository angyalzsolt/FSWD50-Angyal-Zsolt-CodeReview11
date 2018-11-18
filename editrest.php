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

?>



<h1 class="mt-4 mb-3">Library
        <small>Edit the new Restaurant</small>
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





    <form method="post">

			<h5>Restaurant name</h5>
		<input class="form-control" placeholder="Author name" aria-label="Author name" type="text" name="editrestname">
	 	<h5>Restaurant telphoneNumber</h5>
		<input class="form-control" placeholder="Author name" aria-label="Author name" type="text" name="editrestnum">
			<h5>Restaurant type</h5>
		<input class="form-control" placeholder="Author name" aria-label="Author name" type="text" name="editresttype">
			<h5>Restaurant description</h5>
		<input class="form-control" placeholder="Author name" aria-label="Author name" type="text" name="editrestdesc">
		<h5>Image</h5>
		<?php
		$img = new addRest;
		$img->addImage();
		$img->getImage();
 		?>
 		<h5>Web-address</h5>
 		<?php
		
		$img->addWeb();
		$img->getWeb();
 		?>
 		<h5>Location</h5>
 		<?php
	
		$img->addLoc();
		$img->getLoc();
 		

	 $img->addRestaurant() ?>
	 <input class='btn btn-secondary btn-lg btn-block' type='submit' name='addrestaurant' value='Add'>
	</form>
	

<a type="button" class="btn btn-secondary btn-lg btn-block" href="<?php echo $route->addnewitemRoute ?>">Back</a>	
















 <?php include('includes/footer.php'); ?>