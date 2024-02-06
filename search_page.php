<?php 
include("inc/db.php"); 
include("session.php"); 
include("inc/user_header.php"); 
include("nav.php");
?>

<?php

    $location = $_GET['location'];
    $av_from = $_GET['av_from'];
    $av_to = $_GET['av_to'];


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
                            
                            <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Location" required/>
                        </div> 
                        <div class="col-md-2">
                            
                            <input type="time" name="av_from" class="form-control" value="<?php echo $av_from; ?>" placeholder="Time From" required/>
                        </div> 
                        <div class="col-md-2">
                            
                            <input type="time" name="av_to" class="form-control" value="<?php echo $av_to; ?>" placeholder="Timing To" required/>
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
        <h5 class="main_head mb-4" style="color:#000;"> Search Result For : <span style="color:#0099e6;"> <?php echo $location; ?> |  <?php echo $av_from; ?> - <?php echo $av_to; ?></span></h5>
        <div class="row">
        <?php
                //Get All Stadiums
            

                $result = mysqli_query($con,"SELECT * FROM stadiums WHERE st_location LIKE '%$location%'");
                
                while($row = mysqli_fetch_array($result)){
                    $stad_id = $row['id'];
                    $getImages = mysqli_query($con,"SELECT * FROM st_images WHERE st_id = '$stad_id'");
                    $imgData = mysqli_fetch_array($getImages);
                    // var_dump($imgData[0]);
                    echo '
                    <div class="col-md-12">
                        <div class="card mb-5" style="border-radius:10px; overflow:hidden;border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 3px 4px 30px 1px #00000026;">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="card-img-top" src="owner/uploads/'.$imgData['st_image'].'" alt="Card image cap">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['st_name'].'</h5>
                                        <span class="location">'.$row['st_location'].'</span>
                                        <p class="card-text">'.substr_replace($row['st_desc'], "...", 100).'</p>
                                        <a href="details.php?id='.$stad_id.'" class="btn btn-primary">Details</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    ';
                }



            ?>
        </div>
    </div>
</section>











<?php include("inc/user_footer.php");  ?>