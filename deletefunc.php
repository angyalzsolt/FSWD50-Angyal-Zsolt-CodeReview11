<?php 



ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );





class Delete extends DatabaseConnection {


	function get_post($conn, $var){
			return  mysqli_real_escape_string($conn, $_POST[$var]);
		}





	function deleteItem(){
		$conn = mysqli_connect("localhost", "root", "", "cr11_angyalzsolt_travelmatic");
		$sql = "SELECT * FROM restaurant, concert, things_to_do";
		//$conn = $connect->connect();
		if(isset($_POST['resdelete'])){
			
			$counting = $this->get_post($conn, 'counter');
			$sql1 = "DELETE FROM restaurant WHERE restaurant_id = $counting";
			if($this->connect()->query($sql1)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: <h1>".$web."</h1><h1>".$location."</h1>".mysqli_error($conn)."<br>";
						
					}
				
		}elseif(isset($_POST['condelete'])){
			$counting = $this->get_post($conn, 'counter');
			$sql1 = "DELETE FROM concert WHERE concert_id = $counting";
			if($this->connect()->query($sql1)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: <h1>".$web."</h1><h1>".$location."</h1>".mysqli_error($conn)."<br>";
						
					}

		}elseif(isset($_POST['thingdelete'])){
			$counting = $this->get_post($conn, 'counter');
			$sql1 = "DELETE FROM things_to_do WHERE things_id = $counting";
			if($this->connect()->query($sql1)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: <h1>".$web."</h1><h1>".$location."</h1>".mysqli_error($conn)."<br>";
						
					}

		}




		}
	}

	?>
