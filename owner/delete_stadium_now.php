<?php
include("../inc/db.php"); 
include("o_session.php");   

//Booking Slot Script
 
$st_id = $_GET['st_id'];
$userid = $_SESSION['id'];

$delStadium = mysqli_query($con,"DELETE FROM stadiums WHERE id=$st_id");

if($delStadium){
   
   
    echo "<script>alert('Your Stadium has been Deleted!');history.go(-1);</script>";
    


}else{
echo "Error description: " . mysqli_error($con);

}
