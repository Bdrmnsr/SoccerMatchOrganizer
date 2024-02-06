

<?php 

include("inc/db.php"); 
include("session.php"); 
include("inc/user_header.php"); 
include("nav.php"); 


?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-4 text-center">My Bookings List</h5>
            <table class="table">
                <thead class="thead-light">
                    <tr> 
                    <th scope="col">Stadium Image</th>
                    <th scope="col">Stadium Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time From</th>
                    <th scope="col">Time To</th> 
                    <th scope="col">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $userid = $_SESSION['id'];
                        $getStadium = mysqli_query($con,"SELECT * FROM bookings WHERE userid=$userid");
                        
                        while($row = mysqli_fetch_array($getStadium)){
                            //Get Slot Data
                            $slot_it = $row['slot_id'];
                            $getSlot = mysqli_query($con,"SELECT * FROM renting_slots WHERE id=$slot_it");
                            $slot = mysqli_fetch_array($getSlot);

                            //Get Stadium Data
                            $st_id = $row['st_id'];
                            $getstadiums = mysqli_query($con,"SELECT * FROM stadiums WHERE id=$st_id");
                            $stadium = mysqli_fetch_array($getstadiums);

                            //Get Stadium Photo
                            $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$st_id'");
                            $imgData = mysqli_fetch_array($getImages);

                            echo '
                            <tr> 
                                <td><img style="height:60px; width:60px;" class="card-img-top" src="owner/uploads/'.$imgData['st_image'].'" alt="Card image cap"></td>
                                <td><span style="    color: #009be0;
                                font-weight: bold;">'.$stadium['st_name'].'<span></td>
                                <td>'.$slot['s_date'].'</td>
                                <td>'.$slot['s_from'].'</td>
                                <td>'.$slot['s_to'].'</td>
                                <td><a href="details.php?id='.$st_id.'" class="btn btn-danger">View Stadium</a>
                                <a href="cancel_reserve.php?slotid='.$slot['id'].'" class="btn btn-danger">Cancel Reservation</a></td>
                            </tr>
                            ';
                        }
                    ?>
                    <style>
                        table td{
                            vertical-align: middle !important;
                        }
                        tr:nth-child(even) {
                            background-color: #e8e8e8;
                        }
                    </style>
                    
                </tbody>
                </table> 
                
            </div>
        </div>
    </div>
</section>

 
<?php 
 
include("inc/user_footer.php"); 

?>
