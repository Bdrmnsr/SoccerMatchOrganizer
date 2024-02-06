<?php 
include("inc/db.php"); 
// include("o_session.php"); 
include("inc/user_header.php"); 
// include("inc/nav.php");
?>





<section class="main_index">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mainContent">
                    <h5>Soccer Stadium Management System</h5>
                    <a href="login.php" class="btn loginUser">Login as a User</a>
                    <a href="owner/login.php" class="btn loginOwner">Login as a Stadium Owner</a>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    footer{
        display:none;
    }
</style>












<?php include("inc/user_footer.php");  ?>