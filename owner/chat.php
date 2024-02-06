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
                <h5 class="text-center mb-3">Chat with Clients </h5>
                <div class="chatRow">
        <div class="row">
            <div class="col-md-12">
<?php
//Fetch Chat Members
$ownerId = $_SESSION['id'];
$getChat = mysqli_query($con,"SELECT * FROM chat WHERE owner_id=$ownerId");

while($row = mysqli_fetch_array($getChat)){
    $userid = $row['userid'];
    $getUsers = mysqli_query($con,"SELECT * FROM user_login WHERE id=$userid");
    $fethUsers = mysqli_fetch_array($getUsers);
    echo '
    
                <a href="chatbox.php?userid='.$fethUsers['id'].'&chatid='.$row['id'].'">'.$fethUsers['username'].'</a>
          
    ';
}


?>
  </div> 
        </div>
    </div>
<style>

.chatRow{
    box-shadow: 0px 0px 12px 1px #d4cccc;
    padding: 27px;
    border-radius: 7px;
    margin-top: 27px;
}
.chatRow a{
    display: block;
    background-color: #009ddb;
    padding: 11px;
    margin-bottom: 2px;
    text-decoration: none;
    color: #fff;
}
</style>

                
                
            </div>
        </div>
    </div>
</section>




<?php 
 
include("../inc/footer.php"); 

?>
