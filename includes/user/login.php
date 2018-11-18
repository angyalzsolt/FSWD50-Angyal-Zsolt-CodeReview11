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

if(isset($_SESSION['user']) != ""){
  header("Location: $route->homeRoute");
  exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {
 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = strip_tags($pass);
 $pass = trim($_POST['pass']);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT userId, userName, userPass, userRole FROM user WHERE userEmail='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
  
  if( $count == 1 && $row['userPass'] == $password && $row['userRole'] == 1 ) {
   $_SESSION['user'] = $row['userId'];
   $_SESSION['urole'] = $row['userRole'];
    //if($_SESSION['urole'] == 1){
      header("Location: $route->adminRoute");
      exit;
    //}
  } elseif($count == 1 && $row['userPass'] == $password && $row['userRole'] == 2) {
      $_SESSION['user'] = $row['userId'];
      $_SESSION['urole'] = $row['userRole'];
      header("Location: $route->homeRoute");
      exit;
    }else {
      $errMSG = "Incorrect Credentials, Try again...";
    
    }
   
  } 
  
 }




 ?>
<div id="homecontents">
  



 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Sign In.</h2>
            <hr/>
       
           <?php
               if ( isset($errMSG) ) {
                  echo $errMSG;  }
            ?>
        
            <h5>E-mail</h5>
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
            <h5>Password</h5>
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr/>
            <button type="submit" name="btn-login">Sign In</button>
          
          
            <hr/>
  
            <a href="<?php echo $route->registerRoute?>">Sign Up Here...</a>
      
          
   </form></div>
 <?php include('../footer.php') ?>