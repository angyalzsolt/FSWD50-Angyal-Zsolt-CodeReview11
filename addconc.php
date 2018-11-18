<?php 
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");
include("addrestfunc.php");
include("addconcfunc.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;
include("includes/header.php");

?>



<h1 class="mt-4 mb-3">CodeReview11
        <small>Add a new Concert</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo $route->addnewitemRoute ?>">Add new</a>
        </li>
        <li class="breadcrumb-item active">Add new Concert</li>
      </ol>





    <form method="post">

			<h5>Concert Name</h5>
		<input class="form-control" placeholder="Concert name" aria-label="Concert name" type="text" name="concname">
	 	<h5>Concert Date</h5>
		<input class="form-control" placeholder="Concert date" aria-label="Concert date" type="date" name="concdate">
			<h5>Concert Time</h5>
		<input class="form-control" placeholder="Concert time" aria-label="Concert time" type="date" name="conctime">
			<h5>Concert Price</h5>
		<input class="form-control" placeholder="Concert price" aria-label="Concert price" type="text" name="concprice">
		<h5>Image</h5>
		<?php
		$img = new addRest;
		$imgs = new addConc;
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
 		

	 $imgs->addConcert() ?>
	 <input class="btn btn-secondary btn-lg btn-block" type="submit" name="addconcert" value="Add">
	</form>

<a type="button" class="btn btn-secondary btn-lg btn-block" href="<?php echo $route->addnewitemRoute ?>">Back</a>	
















 <?php include('includes/footer.php'); ?>