<?php
ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

include("../header.php");
include("../dbconn.php");
include("../routes.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;

if( isset($_SESSION['user'])!=""){
	header("Location: $route->homeRoute");
}


$error = false;

if(isset($_POST['btn-signup'])){

 	$name = trim($_POST['name']);
  	$name = strip_tags($name);
  	$name = htmlspecialchars($name);

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

  $passcon = trim($_POST['passcon']);
  $passcon = strip_tags($passcon);
  $passcon = htmlspecialchars($passcon);


 	if (empty($name)) {
  		$error = true;
  		$nameError = "Please enter your full name.";
		 } else if (strlen($name) < 3) {
		  $error = true;
		  $nameError = "Name must have at least 3 characters.";
		 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		  $error = true;
		  $nameError = "Name must contain alphabets and space.";
		 }		

 //basic email validation
	 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
	  $error = true;
	  $emailError = "Please enter valid email address.";
	 } else {
	  // checks whether the email exists or not
	  $query = "SELECT `userEmail` FROM `user` WHERE `userEmail`='$email'";
	  $result = mysqli_query($conn, $query);
	  $count = mysqli_num_rows($result);
	  if($count!=0){
	   $error = true;
	   $emailError = "Provided Email is already in use.";
	  }
	 }
	 // password validation
	 if (empty($pass)){
	  $error = true;
	  $passError = "Please enter password.";
	 } else if(strlen($pass) < 6) {
	  $error = true;
	  $passError = "Password must have atleast 6 characters.";
	 } elseif($passcon != $pass){
    $error = true;
    $passError = "Different passwords, try again!";
   }

 // password hashing for security
$password = hash('sha256', $pass);

//define role for the user
$uRole = 1;

 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO user(userName,userEmail,userPass, userRole) VALUES('$name','$email','$password', '$uRole')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}

 ?>
<div id="homecontents">
  



   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2>Sign Up.</h2>
            <hr />
          
           <?php
              if ( isset($errMSG) ) {
            ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
            </div>

            <?php } ?>
          
      
          
            <h4>Name</h4>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
    
            <h4>E-mail</h4>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
            <h4>Password</h4>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
            
            <h4>Re-enter Password</h4>
            <input type="password" name="passcon" class="form-control" placeholder="Re-enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>



            <hr/>

          
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr/>
          
            <a href="<?php echo $route->loginRoute?>">Sign in Here...</a>
    
  
   </form></div>
<?php include('../footer.php') ?>