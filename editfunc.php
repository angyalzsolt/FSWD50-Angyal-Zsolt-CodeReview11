<?php 



ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );




class Edit extends DatabaseConnection {



	function editProfile(){
		$counting = $this->get_post($conn, 'counter');
		$sql = "SELECT * FROM restaurant  WHERE restaurant.restaurant_id = $counting";
		$res = $this->runQuery($sql);
		$rows = $res->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $row) {
			echo "	<h1>Old user</h1><p>Name:</p>
					<input type='text' value='".$row['name']."' name='name'>
					<p>Username:</p>
					<input type='text' value='".$row['userName']."' name='userName'>
					<p>Email:</p>
					<input type='text' value='".$row['userEmail']."' name='email'>
					<p>Age:</p>
					<input type='text' value='".$row['age']."' name='age'>
					<p>Country:</p>
					<input type='text' value='".$row['country']."' name='country'>
					<input type='submit' name='editke' value='Update'>
					";
	}	





}

		function editItem(){
		$conn = mysqli_connect("localhost", "root", "", "cr11_angyalzsolt_travelmatic");
		$sql = "SELECT * FROM restaurant, concert, things_to_do";
		//$conn = $connect->connect();
		if(isset($_POST['resedit'])){
			
			$counting = $this->get_post($conn, 'counter');
			$sql1 = "UPDATE restaurant SET restaurant_name =  WHERE restaurant_id = $counting";
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
		function get_post($conn, $var){
			return  mysqli_real_escape_string($conn, $_POST[$var]);
		}



		function showEdit(){
			
				$conn = $this->connect();
			$counting = $this->get_post($conn, 'counter');
		$sql = "SELECT * FROM restaurant  WHERE restaurant.restaurant_id = $counting";
		$result = $this->connect()->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $row) {

			echo "<div class='modal fade' id='resedit' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
			  <div class='modal-dialog modal-dialog-centered' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <h5 class='modal-title' id='exampleModalLongTitle'>Editeljunk valamit</h5>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			          <span aria-hidden='true'>&times;</span>
			        </button>
			      </div>
			      <div class='modal-body'>
			        <h1>Old user</h1><p>Name:</p>
					<input type='text' value='".$row['name']."' name='name'>
					<p>Username:</p>
					<input type='text' value='".$row['userName']."' name='userName'>
					<p>Email:</p>
					<input type='text' value='".$row['userEmail']."' name='email'>
					<p>Age:</p>
					<input type='text' value='".$row['age']."' name='age'>
					<p>Country:</p>
					<input type='text' value='".$row['country']."' name='country'>
					<input type='submit' name='editke' value='Update'>
					
			       	
			      </div>
			      <div class='modal-footer'>
			        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		
			      </div>
			    </div>
			  </div>
			</div>";
		}
			}
			


	}


}




 ?>
