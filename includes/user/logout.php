<?php
ob_start();
session_start();
include("../header.php");
include("../dbconn.php");
include("../routes.php");

$connect = new DatabaseConnection;
$conn = $connect->connect();

$route = new Routes;

if (!isset($_SESSION['user'])) {
 header("Location: $route->loginRoute");
} else if(isset($_SESSION['user'])!="") {
 header("Location: $route->homeRoute");
}

if (isset($_GET['logout'])) {
 unset($_SESSION['user']);
 unset($_SESSION['urole']);
 session_unset();
 session_destroy();
 header("Location: $route->loginRoute");
 exit;
}
?>