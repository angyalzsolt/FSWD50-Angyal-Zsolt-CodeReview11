<?php 



ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


	


class addThing extends DatabaseConnection {


	function addThingToDo(){
		$conn = $this->connect();
		if(isset($_POST['addthing'])){
			$name = $_POST['thingname'];
			$num = $_POST['thingtype'];
			$type = $_POST['thingdesc'];
			//$descrip = $_POST['concprice'];
			$location = $_POST['loca'];
			$web = $_POST['webadr'];
			if($name =="" || $num == "" || $type == "" || $location =="" || $web ==""){
				echo("<div class='alert alert-danger'><strong>Fill the fields!</strong></div>");

			}else{
					$sql = "INSERT INTO `things_to_do` (`things_id`, `things_name`, `things_type`, `thing_shortdesc`, `fk_web_address`, `fk_location_id`) VALUES (NULL, '$name', '$num', '$type', '$location', '$web');";
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