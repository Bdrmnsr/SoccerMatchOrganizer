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
                <h5 class="text-center mb-3">Chat with Stadium Owner</h5>
                    <?php
                    //Fetch Chat Members
                    $userid = $_SESSION['id'];
                    $getChat = mysqli_query($con,"SELECT * FROM chat WHERE userid=$userid");

                    while($row = mysqli_fetch_array($getChat)){
                        $owner_id = $row['owner_id'];
                        $getOwn = mysqli_query($con,"SELECT * FROM st_own WHERE id=$owner_id");
                        $fethUsers = mysqli_fetch_array($getOwn);
                        echo '
                        <div class="chatRow">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="chatbox.php?userid='.$fethUsers['id'].'&chatid='.$row['id'].'">'.$fethUsers['username'].'</a>
                                </div> 
                            </div>
                        </div>
                        ';
                    }


                    ?>
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




















<?php include("inc/user_footer.php");  ?>