<?php 
include("inc/db.php"); 
include("session.php"); 
include("inc/user_header.php"); 
include("nav.php");
?>




<section class="hero_sec mb-5">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <form action="search_page.php" method="GET">
                    <div class="row">
                        <div class="col-md-6"><label style="color:#fff;">Enter Location</label></div>
                        <div class="col-md-2"><label style="color:#fff;">Enter Start Time</label></div>
                        <div class="col-md-2"><label style="color:#fff;">Enter End Time</label></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <input type="text" name="location" class="form-control" placeholder="Location" required/>
                        </div> 
                        <div class="col-md-2">
                            
                            <input type="time" name="av_from" class="form-control" placeholder="Time From" required/>
                        </div> 
                        <div class="col-md-2">
                            
                            <input type="time" name="av_to" class="form-control" placeholder="Timing To" required/>
                        </div> 
                        <div class="col-md-2">
                            <button class="btn btn-primary">Search</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<section class="mt-5">
    <div class="container">
        <h5 class="main_head mb-4"> View All Stadiums </h5>
        <div class="row">

        


        <?php
    //Get All Stadiums
    
    

    $result = mysqli_query($con,"SELECT * FROM stadiums");
    
    while($row = mysqli_fetch_array($result)){
        $stad_id = $row['id'];
        $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$stad_id'");
        $imgData = mysqli_fetch_array($getImages);
        // var_dump($imgData[0]);
        echo ' 
        <div class="col-md-4">
            <a href="details.php?id='.$stad_id.'" class="stBox">
                <div class="inner_box_st" style="background-image:url(owner/uploads/'.$imgData['st_image'].');">
                    <div class="mainCont">
                        <h5>'.$row['st_name'].'</h5>
                        <span class="location">'.$row['st_location'].'</span>
                    </div>
                </div>
            </a>
        </div>  
        ';
    }



?>
        </div>
    </div>
</section>











<?php include("inc/user_footer.php");  ?>