<?php 

ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );






class addRest extends DatabaseConnection {

	function addImage(){
		$sql = "SELECT * FROM image";
		$result = $this->connect()->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);

		echo "<div class='input-group'><select class='custom-select' id='inputGroupSelect04' name='image'>
        		<option value='#'>Choose a file</option>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['image_id']."'>".$row['image_url']."</option>";
	}
		echo "	</select><div class='input-group-append'>
    				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#newimg'>
  						Add new
					</button>
  					</div>
				</div>
				<div class='modal fade' id='newimg' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>New Image</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				        <form  method='post'>
				        	<h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newimages'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='newurl' value='Add'>

				        
				        </div>
				      <div class='modal-footer'>
				      
				      </div>
				    </div>
				  </div>
				</div>";
	}


	function getImage(){

		if(isset($_POST['newurl'])){
			$name = $_POST['newimages'];
			if($name == ""){
				echo "<div class='alert alert-danger'><strong>Fill the fields!</strong></div>";
			}else{
				//$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql1 = "SELECT image_url FROM image WHERE image_url = '$name'";
				$s = $this->connect()->query($sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "<div class='alert alert-danger'><strong>Item already exists!</strong></div>";
				}else {
					$sql = "INSERT INTO `image` (`image_url`) VALUES ('$name')";
					if($this->connect()->query($sql)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}	
		}
	}

	function addWeb(){
		$sql = "SELECT * FROM web_address";
		$result = $this->connect()->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);

		echo "<div class='input-group'><select class='custom-select' id='inputGroupSelect04' name='webadr'>
        		<option value='#'>Choose a file</option>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['web_address_id']."'>".$row['web_url']."</option>";
	}
		echo "	</select><div class='input-group-append'>
    				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#newweb'>
  						Add new
					</button>
  					</div>
				</div>
				<div class='modal fade' id='newweb' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>New Web address</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				        <form  method='post'>
				        	<h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newweburl'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='newwebs' value='Add'>
				        </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				        <button type='button' class='btn btn-primary' name=''>Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>";
	}

	function getWeb(){

		if(isset($_POST['newwebs'])){
			$name = $_POST['newweburl'];
			if($name == ""){
				echo "<div class='alert alert-danger'><strong>Fill the fields!</strong></div>";
			}else{
				//$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql1 = "SELECT web_url FROM web_address WHERE web_url = '$name'";
				$s = $this->connect()->query($sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "<div class='alert alert-danger'><strong>Item already exists!</strong></div>";
				}else {
					$sql = "INSERT INTO `web_address` (`web_url`) VALUES ('$name')";
					if($this->connect()->query($sql)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}	
		}
	}

	function addLoc(){
		$sql = "SELECT * FROM location";
		$sql1 = "SELECT *FROM image";

		$result = $this->connect()->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);

		$result1 = $this->connect()->query($sql1);
		$rows1 = $result1->fetch_all(MYSQLI_ASSOC);

		echo "<div class='input-group'><select class='custom-select' id='inputGroupSelect04' name='loca'>
        		<option value='#'>Choose a file</option>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['location_id']."'>".$row['country']." - ".$row['city']." - ".$row['street']."</option>";
	}
		echo "	</select><div class='input-group-append'>
    				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#newloc'>
  						Add new
					</button>
  					</div>
				</div>
				<div class='modal fade' id='newloc' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>New Location</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				        <form  method='post'>
				        	<h5>Country</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newcountry'>
				            <h5>City</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newcity'>
				            <h5>Street</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newstreet'>
				            <h5>Zip</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='newzip'>
				            <h5>Image</h5>";
				           echo "<div class='input-group'><select class='custom-select' id='inputGroupSelect04' name='img'>
        							<option value='#'>Choose a file</option>";
            				foreach ($rows1 as $row1) { 
            						echo "<option value='".$row1['image_id']."'>".$row1['image_url']."</option>";
							}
							echo "	</select><div class='input-group-append'>";
				            echo" </div>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='newlocation' value='Add'>

				      
				        
				        </div>
				        </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				        <button type='button' class='btn btn-primary' name='".$row[$b]."'>Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>
					 ";
	}


	function getLoc(){

		if(isset($_POST['newlocation'])){
			$country = $_POST['newcountry'];
			$city = $_POST['newcity'];
			$street = $_POST['newstreet'];
			$zip = $_POST['newzip'];
			$img = $_POST['img'];
			if($country == "" || $city == "" || $street == "" || $zip == "" || $img == "" ){
				echo "<div class='alert alert-danger'><strong>Fill the fields!</strong></div><h1>$img</h1>";
			}else{
				//$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql1 = "SELECT country, city, street, zip  FROM location WHERE street = '$street'";
				$s = $this->connect()->query($sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "<div class='alert alert-danger'><strong>Item already exists!</strong></div>";
				}else {
					$sql = "INSERT INTO `location` (`location_id`, `country`, `city`, `street`, `zip`, `fk_image_id`)  VALUES (NULL, '$country', '$city', '$street', '$zip', '$img')";
					if($this->connect()->query($sql)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}	
		}
	}


	

	function addRestaurant(){
		$conn = $this->connect();
		if(isset($_POST['addrestaurant'])){
			$name = $_POST['restname'];
			$num = $_POST['restnum'];
			$type = $_POST['resttype'];
			$descrip = $_POST['restdesc'];
			$location = $_POST['loca'];
			$web = $_POST['webadr'];
			if($name == "" || $num == "" || $type == "" || $descrip == "" || $location =="" || $web ==""){
				echo("<div class='alert alert-danger'><strong>Fill the fields!</strong></div>");
			}else{
				$sql = "INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_tel_num`, `restaurant_type`, `restaurant_shortdesc`, `fk_location_id`, `fk_web_address`) VALUES (NULL, '$name', '$num', '$type', '$descrip', '$location', '$web');";
			if($this->connect()->query($sql)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}


			}
			

		}
	}


}





 ?>