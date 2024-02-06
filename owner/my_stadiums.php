

<?php 

include("../inc/db.php"); 
include("o_session.php"); 
include("../inc/header.php"); 
include("nav.php"); 


?>





<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-5">My Stadiums</h5>
                <div class="row">
<?php
    //Get All Stadiums
    $id = $_SESSION['id'];

    $result = mysqli_query($con,"SELECT * FROM stadiums WHERE owner_id = '$id'");
    
    while($row = mysqli_fetch_array($result)){
        $stad_id = $row['id'];
        $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$stad_id'");
        $imgData = mysqli_fetch_array($getImages);
        // var_dump($imgData[0]);
        echo '
        <div class="col-md-4">
        <a href="details.php?id='.$stad_id.'" class="stBox">
            <div class="inner_box_st" style="background-image:url(uploads/'.$imgData['st_image'].');">
                <div class="mainCont">
                   
                    <h5>'.$row['st_name'].'</h5>
                    <span class="location">'.$row['st_location'].'</span>
                    <div class="badgesTop" style="    color: #fff;">
                        <span class="canc">Cancelled Count: <span style="color:#009be0;">'.$row['booked_times'].' </span></span>
                        <span class="bk">Booked Count: <span style="color:#009be0;">'.$row['cancelled_times'].' </span> </span>

                    </div>
                    <a href="delete_stadium_now.php?st_id='.$row['id'].'" class="btn btn-primary mt-3">Delete Stadium</a>
                </div>
            </div>
        </a>
    </div>  
        ';
    }



?>



                    
                </div>
            </div>
        </div>
    </div>
</section>

 
<?php 
 
include("../inc/footer.php"); 

?>
