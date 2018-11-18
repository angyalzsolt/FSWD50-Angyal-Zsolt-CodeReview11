<?php 

class DatabaseConnection {

	private $servername;
	private $username;
	private $password;
	private $dbname;

	function connect(){

		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "cr11_angyalzsolt_travelmatic";

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($conn){
			echo "";
		}else {
			echo "THERE SOME PROBLEM".mysqli_error($conn);
		}
		return $conn;

	}

}




 ?>