<?php
include("../inc/db.php");

session_start();
if (!isset($_SESSION['id'])){
header('location:login.php');
}

$id = $_SESSION['id'];

$query=mysqli_query($con,"SELECT * FROM st_own WHERE id ='$id'");
$row=mysqli_fetch_array($query); 
$username=$row['username'];
$email=$row['email']; 
?>



