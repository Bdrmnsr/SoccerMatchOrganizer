

<?php 

include("../inc/db.php"); 
include("o_session.php"); 
include("../inc/header.php"); 
include("nav.php"); 


?>


 

<section class="mt-5">
    <div class="container"> 
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
            <div class="inner_box_st" style="background-image:url(uploads/'.$imgData['st_image'].');">
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






 
<?php 
 
include("../inc/footer.php"); 

?>
