<?php
include("inc/db.php"); 
include("session.php"); 
//Booking Slot Script
 
$slot_id = $_GET['slotid'];
$userid = $_SESSION['id'];

$delbooking = mysqli_query($con,"DELETE FROM bookings WHERE slot_id=$slot_id");
 
//Booking stats

$getOwner = mysqli_query($con,"SELECT * FROM renting_slots WHERE id=$slot_id");
$Owner = mysqli_fetch_array($getOwner);
$stID = $Owner['st_id'];

$GETst = mysqli_query($con,"SELECT * FROM stadiums WHERE id=$stID");
$OwnerGETst = mysqli_fetch_array($GETst);
$stIDGETst = $OwnerGETst['id'];
 
$cancelled_conts = $OwnerGETst['cancelled_times'];
 
$New_cancelled_conts = $cancelled_conts+1;

$queryUpdateCounts = mysqli_query($con,"UPDATE stadiums SET cancelled_times=$New_cancelled_conts WHERE id=$stIDGETst");





$queryUpdateSlot = mysqli_query($con,"UPDATE renting_slots SET s_status='0' WHERE id=$slot_id");
if($queryUpdateSlot){
   
   
        echo "<script>alert('Your Reservation has been Cancelled!');history.go(-1);</script>";
        

    
}else{
    echo "Error description: " . mysqli_error($con);

}




?>