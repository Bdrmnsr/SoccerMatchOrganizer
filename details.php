

<?php 

include("inc/db.php"); 
include("session.php"); 
include("inc/user_header.php"); 
include("nav.php"); 

$stadium_id = $_GET['id'];
$getStadium = mysqli_query($con,"SELECT * FROM stadiums WHERE id=$stadium_id");
$row = mysqli_fetch_array($getStadium);

?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-3"><?php echo $row['st_name']; ?></h4>
                <p style="font-size: 14px; color: #009ddb;"><?php echo $row['st_location']; ?></p>
                <p><?php echo $row['st_desc']; ?></p>  
                
              
                <br>
                <h5>Facilities:</h5>
                <p><?php echo $row['st_facilities']; ?></p>
            </div>
            <div class="col-md-6">    

                <div class="row">
                <div class="col-md-12">
                        <div class="alert alert-primary rentingSlots">
                            <h5>Renting Slots Statistics</h5>
                            <p class="row"><span class="col-md-3"><b>Date</b></span>    <span class="col-md-2"><b>Time From</b></span>  <span class="col-md-2"><b>Time To</b></span>  <span class="col-md-2"> <b>Avalability</b></span>  <span class="col-md-3"> <b>Action</b></span></p>
                            <?php

                                $st_id = $_GET['id'];
                                $getSlots = mysqli_query($con,"SELECT * FROM renting_slots WHERE st_id='$st_id' ");
                                while($row = mysqli_fetch_array($getSlots)){
                                    echo '<p class="row"><span class="col-md-3">'.$row['s_date'].'</span>  <span class="col-md-2">'.$row['s_from'].'</span> <span class="col-md-2">'.$row['s_to'].'</span>  <span class="col-md-2"> ';
                                    $stts = $row['s_status'];
                                    if($stts == 0){
                                        echo '<i style="color:green;">Available</i>';
                                        echo '</span><span class="col-md-3"><a class="btn btn-danger" href="book_now.php?slotid='.$row['id'].'&st_id='.$stadium_id.'">Book Now</a></span></p>';
                                    }else{
                                        echo '<i style="color:red;">Booked</i>';
                                        echo '</span><span class="col-md-3"><button class="btn btn-dark" disabled>Already Booked</button></span></p>';
                                    }
                                    
                                }



                            ?> 
                        </div>   
                        <style>
                            .rentingSlots p span{
                                font-size: 14px; 
                            }
                            .rentingSlots p{ 
                                font-size: 14px;
                                margin-bottom: 0px;
                                border-bottom: 1px solid #b9b9b9;
                                padding-bottom: 5px;
                                padding-top: 5px;
                            }
                            .rentingSlots a{
                                font-size: 12px;
                            }
                            .rentingSlots button{
                                font-size: 12px;
                            }
                        </style>    
                    </div>
                </div>

                <!-- <div class="alert alert-primary">
                    <h5>Book Now:</h5>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Select Date</label>
                                    <input id="datepicker" class="form-control" name="b_date" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Select From</label>
                                    <input type="time" class="form-control" name="b_from" />
                                </div>
                            </div>
                            <div class="col-md-4">
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
                </div> -->


                

<?php

 if(isset($_POST['submit_book'])){
    $st_id = $_GET['id'];
    $userid = $_SESSION['id'];
    $b_date = $_POST['b_date'];
    $b_from = $_POST['b_from'];
    $b_to = $_POST['b_to'];


    $check_Availability = mysqli_query($con,"SELECT * FROM bookings 
    WHERE b_date>='$b_date'
    AND b_to<='$b_to'");

    $numRows = mysqli_num_rows($check_Availability);
    echo "<script>alert('".$numRows."');</script>";
    exit();
    // vardump($check_Availability);
    // exit();


    // $insertBooking= mysqli_query($con,"INSERT INTO bookings (st_id,userid,b_date,b_from,b_to,b_status)
    // VALUES ('$st_id','$userid','$b_date','$b_from','$b_to','0')");

    // if($insertBooking){ 
    //     echo "<script>alert('Your booking has been made!');</script>";
    // }else{
    //     echo "Error description: " . mysqli_error($con);

    // }


 }

?>


            </div>
            
        </div>
        <div class="row mt-5">
                <div class="col-md-12">
                <h5>Photos:</h5>
               
                </div>
            </div>
             <div class="row stad_images">
                
                    <?php 
                        $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$stadium_id'");
                         
                        while($imgData = mysqli_fetch_array($getImages)){
                            echo '<div class="col-md-3">
                                <img src="owner/uploads/'.$imgData['st_image'].'" />
                            </div>';
                        }
                    
                    ?>
                </div>
    </div>
</section>

 
<?php 
 
include("inc/user_footer.php"); 

?>
