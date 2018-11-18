<?php 



ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );





class addConc extends DatabaseConnection {

	function addConcert(){
		if(isset($_POST['addconcert'])){
			$name = $_POST['concname'];
			$num = $_POST['concdate'];
			$type = $_POST['conctime'];
			$descrip = $_POST['concprice'];
			$location = $_POST['loca'];
			$web = $_POST['webadr'];
			if($name == "" || $num == "" || $type == "" || $descrip == "" || $location =="" || $web ==""){
				echo("<div class='alert alert-danger'><strong>Fill the fields!</strong></div>");
			}else{
				$sql = "INSERT INTO `concert` (`concert_id`, `concert_name`, `concert_date`, `concert_time`, `concert_price`, `fk_location_id`, `fk_web_address`) VALUES (NULL, '$name', '$num', '$type', '$descrip', '$location', '$web');";
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