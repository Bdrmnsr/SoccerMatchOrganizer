<?php



include("../inc/db.php"); 
include("o_session.php"); 
include("../inc/header.php"); 
include("nav.php"); 


?>



<section class="chatSec">
	<div class="container">
		<h3 class=" mb-3 text-center">Chat Box</h3>
		<div class="messaging">
			<div class="inbox_msg">
				 
				<div class="mesgs">
					<div class="msg_history">

                        <?php  
                            //Get Chat Messages between User and Stadium Owner
                            $chatid = $_GET['chatid'];
                            $getChat = mysqli_query($con,"SELECT * FROM chat_message WHERE chatbox=$chatid");

                            while($row = mysqli_fetch_array($getChat)){
                                $status = $row['status'];
                                
                                //Getting User Name
                                $userid = $_GET['userid'];
                                $getUser = mysqli_query($con,"SELECT * FROM user_login WHERE id=$userid");
                                $getUserData = mysqli_fetch_array($getUser);

                                if($status == 0){
                                    echo '
                                    <div class="incoming_msg"> 
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <h6 style="font-size: 13px;">'.$getUserData['username'].'</h6>
                                                <p>'.$row['chat_message'].'</p> <span class="time_date">'.$row['timestamp'].'</span></div>
                                        </div>
                                    </div>
                                    ';
                                }elseif($status == 1){
                                    echo '
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <h6 style="font-size: 13px;">Me</h6>
                                            <p>'.$row['chat_message'].'</p> <span class="time_date">'.$row['timestamp'].'</span> </div>
                                    </div>
                                    ';
                                }
                            }

                        ?> 
						
					</div>
					<div class="type_msg">
						<div class="input_msg_write">
                            <form method="post">
							    <input type="text" name="message" class="write_msg" placeholder="Type a message" />
							    <button class="msg_send_btn" name="sendmsg" type="submit">Send</button>
                            </form>

<?php
    if(isset($_POST['sendmsg'])){
        $message = $_POST['message'];
        $userid = $_GET['userid'];
        $chatid = $_GET['chatid'];
        $ownerid = $_SESSION['id'];
        
        $sendmessage= mysqli_query($con,"INSERT INTO chat_message (to_user_id,from_user_id,chat_message,status,chatbox)
        VALUES ('$userid','$ownerid','$message','1','$chatid')");
        
        if($sendmessage){
            $page = $_SERVER['HTTP_REFERER'];
            echo "<script>window.location.replace('".$page."')</script>";
        }

    }


?>





						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<style>

.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 100%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #009be2 none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
    background: #009be2 none repeat scroll 0 0;
    border: medium none;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 35px;
    position: absolute;
    right: 0;
    top: 6px;
    width: 62px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 300px;
  overflow-y: auto;
}

</style>



 
<?php 
 
include("../inc/footer.php"); 

?>

