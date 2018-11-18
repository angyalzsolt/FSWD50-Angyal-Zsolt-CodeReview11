<?php 
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


include("includes/dbconn.php");
include("includes/routes.php");
include("addrestfunc.php");
include("addthingfunc.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;
include("includes/header.php");

?>



<h1 class="mt-4 mb-3">Library
        <small>Add a new Thing-to-do</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo $route->homeRoute ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo $route->addnewitemRoute ?>">Add new</a>
        </li>
        <li class="breadcrumb-item active">Add a new Thing-to-do</li>
      </ol>





    <form method="post">

			<h5>Event Name</h5>
		<input class="form-control" placeholder="Thing name" aria-label="Thing name" type="text" name="thingname">
	 	<h5>Event Type</h5>
		<input class="form-control" placeholder="Thing type" aria-label="Thing type" type="text" name="thingtype">
			<h5>Event description</h5>
		<input class="form-control" placeholder="Thing description" aria-label="Thing description" type="text" name="thingdesc">
			
		<h5>Image</h5>
		<?php
		$img = new addRest;
		$imgs = new addThing;
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
 		

	 $imgs->addThingToDo() ?>
	 <input class="btn btn-secondary btn-lg btn-block" type="submit" name="addthing" value="Add">
	</form>

<a type="button" class="btn btn-secondary btn-lg btn-block" href="<?php echo $route->addnewitemRoute ?>">Back</a>	
















 <?php include('includes/footer.php'); ?>