<?php 
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );



$connect = new DatabaseConnection;
$conn = $connect->connect();


class RunQuery extends DatabaseConnection {

	public $country;
	public $city; 
	public $street;
	public $zip; 


 function showCard($newsql, $sql1, $sql2, $sql3, $sql4, $sql5, $sql6){
 		$this->sql = $newsql;
 		$this->sql1 = $sql1;
 		$this->sql2 = $sql2;
 		$this->sql3 = $sql3;
 		$this->sql4 = $sql4;
 		$this->sql5 = $sql5;
 		$this->sql6 = $sql6;
 		$newsql1 = str_replace(' ', '', $sql1);
 		$this->country = "country";
 		$this->city = "city";
 		$this->street = "street";
 		$this->zip = "zip";
 		$this->img = "image_url";


 		$result = $this->connect()->query($newsql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $row) {
			$newsql1 = str_replace(' ', '', $row[ $sql1]);
			$lownewsql1 = strtolower($newsql1);
			# code...
		
		echo "<div class='col-lg-4'>
		<div class='card'>
			    <img class='card-img-top' src='".$row[$this->img]."' alt='Card image cap'>
			    <div class='card-body'>
			      <h5 class='card-title'>".$row[$sql1]."</h5>
			      <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			      <p>".$row[$sql1]."</p>
			      <p>".$row[$sql2]."</p>
			      <p>".$row[$sql3]."</p>
			      <p>".$row[$sql4]."</p>
			    </div>
			    <div class='card-footer'>
			      <form method='post'>
			      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#".$newsql1."'>
  						Show details
					</button>";
			       if($_SESSION['urole'] == 1){
			        	echo "
			        	<button type='button' class='btn btn-success' data-toggle='modal' data-target='#edit".$newsql1."'>
  						Edit
					</button>
			        			<input class='btn btn-danger' type='submit' name='".$sql6."delete' value='Delete'>
			        <input type='hidden' name='counter' value='".$row[$sql5]."'></a>
			      </form>
			    </div>
			  </div></div>";
}else{
	echo " <input type='hidden' name='counter' value='".$row[$sql5]."'></a>
		      </form>
			    </div>
			  </div>
			 </div>";}
			 echo"	
			  <div class='modal fade' id='".$newsql1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
			  <div class='modal-dialog modal-dialog-centered' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <h5 class='modal-title' id='exampleModalLongTitle'>Details</h5>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			          <span aria-hidden='true'>&times;</span>
			        </button>
			      </div>
			      <div class='modal-body'>
			        <p>".$row[$sql1]."</p>
			        <h5>Address</h5
			      <p>Country: ".$row[$this->country]."</p>
			      <p>City: ".$row[$this->city]."</p>
			      <p>Street: ".$row[$this->street]."</p>
			      <p>ZIP: ".$row[$this->zip]."</p>
			      </div>
			      <div class='modal-footer'>
			        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		
			      </div>
			    </div>
			  </div>
			</div>
			";
 }
}



/*
<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
  Launch demo modal
</button>

<!-- Modal -->
<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ...
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class='modal fade' id='edit".$newsql1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
			  <div class='modal-dialog modal-dialog-centered' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <h5 class='modal-title' id='exampleModalLongTitle'>Editeljunk valamit</h5>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			          <span aria-hidden='true'>&times;</span>
			        </button>
			      </div>
			      <div class='modal-body'>
			        <p>".$row[$sql1]."</p>
			        <h5>Address</h5
			      <p>Country: ".$row[$this->country]."</p>
			      <p>City: ".$row[$this->city]."</p>
			      <p>Street: ".$row[$this->street]."</p>
			      <p>ZIP: ".$row[$this->zip]."</p>
			      </div>
			      <div class='modal-footer'>
			        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		
			      </div>
			    </div>
			  </div>
			</div>





	
	function getData($newsql, $a, $b, $c, $d, $e){
		$this->sql = $newsql;
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
		$this->d = $d;
		$this->e = $e;


		$result = $this->connect()->query($newsql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		//$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);

		echo "<div class='input-group'><select class='custom-select' id='inputGroupSelect04' name='author'>
        		<option value='#'>Choose a file</option>";

		foreach($rows as $row){
			echo "<option value='".$row[$a]."'>".$row[$b]."</option>";
		}
		echo "	</select><div class='input-group-append'>
					<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#$b'>
						Add new
					</button>
    		
  					</div>
				</div>
				<div class='modal fade' id='$b' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				        <form  method='post'>
				        	<h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				            <h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				            <h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				            <h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				            <h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				            <h5>Name</h5>
				            <input class='form-control' aria-label='Publisher name' type='text' name='".$row[$d]."'>
				            <input class='btn btn-secondary btn-lg btn-block' type='submit' name='".$row[$e]."' value='Add'>
				        </form>
				        ...
				      </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				        <button type='button' class='btn btn-primary' name='".$row[$b]."'>Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>";
					
}



	function addData($x, $y, $z, $q, $d, $e){

		$this->x = $x;
		$this->y = $b;
		$this->z = $z;
		$this->q = $q;
		$this->d = $d;
		$this->e = $e;

		if(isset($_POST[$e])){
			$name = $_POST[$d];
			if($name == ""){
				echo "<div class='alert alert-danger'><strong>Fill the fields!</strong></div>";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				//$result = $this->connect()->query($z);
				
				//$sql1 = "SELECT name FROM publisher WHERE name = '$name'";
				$s = mysqli_query($conn, $z);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				//$rows = $result->fetch_all(MYSQLI_ASSOC);
				$samelong = count($rows);

				if($samelong > 0){
					echo "<div class='alert alert-danger'><strong>Item already exists!</strong></div>";
				}else {
					//$sql = "INSERT INTO `publisher` (`name`) VALUES ('$name')";

					if(mysqli_query($conn, $q)){
						echo "<div class='alert alert-success'><strong>Success!!!!!</strong></div>";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}
		}
	}
		}





	$sql  = "SELECT location.country, location.city, location.street, location.zip, location.fk_image_id FROM location "


*/}

 ?>

