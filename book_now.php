<?php
include("inc/db.php"); 
include("session.php"); 
//Booking Slot Script

$st_id = $_GET['st_id'];
$slot_id = $_GET['slotid'];
$userid = $_SESSION['id'];

$getOwner = mysqli_query($con,"SELECT * FROM stadiums WHERE id=$st_id");
$Owner = mysqli_fetch_array($getOwner);
$ownerId = $Owner['owner_id'];
$stIdB = $Owner['id'];

   //Booking stats
   $book_counts = $Owner['booked_times'];
   $cancelled_conts = $Owner['cancelled_times'];

   $New_book_counts = $book_counts+1;
   $New_cancelled_conts = $cancelled_conts+1;

   $queryUpdateCounts = mysqli_query($con,"UPDATE stadiums SET booked_times=$New_book_counts WHERE id=$stIdB");
  



$queryUpdateSlot = mysqli_query($con,"UPDATE renting_slots SET s_status='1' WHERE id=$slot_id");
if($queryUpdateSlot){
    $insertBooking= mysqli_query($con,"INSERT INTO bookings (st_id,userid,slot_id,owner_id)
    VALUES ('$st_id','$userid','$slot_id','$ownerId')");


 

    //Start Chat 
    $chatcheck = mysqli_query($con,"SELECT * FROM chat WHERE userid=$userid");
    $countChats = mysqli_num_rows($chatcheck);

    if($countChats > 0){
        
    }else{
        $startChats= mysqli_query($con,"INSERT INTO chat (userid,owner_id)
        VALUES ('$userid','$ownerId')");
    }
    

    if($insertBooking){ 
        echo "<script>alert('Your booking has been made!');history.go(-1);</script>";
        

    }else{
        echo "Error description: " . mysqli_error($con);

    }
}




?>