

<?php 

include("../inc/db.php"); 
include("o_session.php"); 
include("../inc/header.php"); 
include("nav.php"); 

$stadium_id = $_GET['id'];
$getStadium = mysqli_query($con,"SELECT * FROM stadiums WHERE id=$stadium_id");
$row = mysqli_fetch_array($getStadium);

?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3"><?php echo $row['st_name']; ?></h4>
                <p><?php echo $row['st_desc']; ?></p> 
                <h5>Location:</h5>
                <p><?php echo $row['st_location']; ?></p>
                <h5>Photos:</h5>
                <div class="row stad_images">
                    <?php 
                        $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$stadium_id'");
                         
                        while($imgData = mysqli_fetch_array($getImages)){
                            echo '<div class="col-md-3">
                                <img src="uploads/'.$imgData['st_image'].'" />
                            </div>';
                        }
                    
                    ?>
                </div>
                <br>
                <h5>Facilities:</h5>
                <p><?php echo $row['st_facilities']; ?></p>



 
            </div>
        </div>
                        
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-primary">
                            <h5>Add Renting Slots:</h5>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Select Date</label>
                                            <input id="datepicker" class="form-control" name="b_date" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Select From</label>
                                            <input type="time" class="form-control" name="b_from" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Select To</label>
                                            <input type="time" class="form-control" name="b_to" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="submit_book">Book Now</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-primary rentingSlots">
                            <h5>Renting Slots Statistics</h5>
                            <p><span><b>Date</b></span>    <span><b>Time From</b></span>  <span><b>Time To</b></span>  <span> <b>Avalability</b></span></p>
                            <?php

                                $st_id = $_GET['id'];
                                $getSlots = mysqli_query($con,"SELECT * FROM renting_slots WHERE st_id='$st_id' ");
                                while($row = mysqli_fetch_array($getSlots)){
                                    echo '<p><span>'.$row['s_date'].'</span>  -  <span>'.$row['s_from'].'</span> - <span>'.$row['s_to'].'</span> - <span> ';
                                    $stts = $row['s_status'];
                                    if($stts == 0){
                                        echo '<i style="color:green;">Available</i>';
                                    }else{
                                        echo '<i style="color:red;">Booked</i>';
                                    }
                                    echo '</span></p>';
                                }



                            ?> 
                        </div>   
                        <style>
                            .rentingSlots p span{
                                font-size: 14px;
                                width: 19%;
                                display: inline-block;
                            }
                            .rentingSlots p{ 
                                font-size: 14px;
                                margin-bottom: 0px;
                                border-bottom: 1px solid #b9b9b9;
                                padding-bottom: 5px;
                                padding-top: 5px;
                            }
                        </style>    
                    </div>
                </div>

<?php

if(isset($_POST['submit_book'])){
   $st_id = $_GET['id'];
   $userid = $_SESSION['id'];
   $b_date = $_POST['b_date'];
   $b_from = $_POST['b_from'];
   $b_to = $_POST['b_to'];


//    $check_Availability = mysqli_query($con,"SELECT * FROM bookings 
//    WHERE b_date>='$b_date'
//    AND b_to<='$b_to'");

//    $numRows = mysqli_num_rows($check_Availability);
//    echo "<script>alert('".$numRows."');</script>";
//    exit();
   

   $insertBooking= mysqli_query($con,"INSERT INTO renting_slots (st_id,s_from,s_to,s_date,s_status)
   VALUES ('$st_id','$b_from','$b_to','$b_date','0')");

   if($insertBooking){ 
        $page = $_SERVER['HTTP_REFERER'];
       echo "<script>alert('Your Renting Slot has been Added!');window.location.replace('".$page."')</script>";
       
      
   }else{
       echo "Error description: " . mysqli_error($con);

   }


}

?>

    </div>
</section>

 
<?php 
 
include("../inc/footer.php"); 

?>
