

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
                <h5 class="mb-5">Add New Stadium</h5>
                <form  method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stadium Name</label>
                                <input type="text" name="st_name" class="form-control" placeholder="" required/>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control"  required/>
                            </div>
                            <div class="form-group">
                                <label>Facilities</label>
                                <input type="text" name="facilities" class="form-control"  required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photos</label>
                                <input type="file" name="files[]" class="form-control" multiple  required/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="st_desc" class="form-control"  required></textarea>
                            </div> 
                        </div>
                    </div> 
                   
                    <button type="submit" class="btn btn-primary" name="add_stadium">Add Stadium</button>
                </form>




<?php
    //Add Stadium to db Script
    if(isset($_POST['add_stadium'])){

        $id = $_SESSION['id'];
        $name         = $_POST['st_name'];
        $location     = $_POST['location'];
        $facilities   = $_POST['facilities'];
        $st_desc      = $_POST['st_desc'];
        $current_time = date('d-m-y');

        // var_dump($photos);
        // exit();

        

        $uploadStadium= mysqli_query($con,"INSERT INTO stadiums (owner_id,st_name,st_location,st_facilities,st_desc)
                                        VALUES ('$id','$name','$location','$facilities','$st_desc')");
       
        if($uploadStadium){  

          
          
                $last_inserted_id = mysqli_insert_id($con);
                // echo "<script>alert('Stadium has been added successfully');</script>";
                // exit();
                //Upload Multiple Images in DB
                $targetDir = "uploads/"; 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $fileNames = array_filter($_FILES['files']['name']); 
                // if(!empty($fileNames)){ 
                    foreach($_FILES['files']['name'] as $key=>$val){ 
                        // File upload path 
                        $fileName = basename($_FILES['files']['name'][$key]); 
                        $targetFilePath = $targetDir . $fileName; 
                        
                        // Check whether file type is valid 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        if(in_array($fileType, $allowTypes)){ 
                            // Upload file to server 
                            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 

                                // Image db insert sql 
                                // $insertValuesSQL .= $fileName; 
                                // $insertValuesSQL = trim($insertValuesSQL); 
                                // Insert image file name into database 
                                $insert = $con->query("INSERT INTO st_images (st_id, st_image) VALUES ('$last_inserted_id','$fileName')"); 
                                if($insert){
                                    echo "<script>alert('Stadium has been added successfully'); window.location='add_stadium.php'</script>";
                                }
                            }else{ 
                                $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                            } 
                        }else{ 
                            $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                        } 
                    } 
                    
                    // Error message 
                    // $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                    // $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                    // $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                    
                    // if(!empty($insertValuesSQL)){ 
                        // $insertValuesSQL = trim($insertValuesSQL); 
                        // Insert image file name into database 
                        // $insert = $con->query("INSERT INTO st_images (st_id, st_image) VALUES ('$last_inserted_id','$insertValuesSQL')"); 
                        // if($insert){ 
                        //     $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                        // }else{ 
                        //     $statusMsg = "Sorry, there was an error uploading your file."; 
                        // } 
                    // }else{ 
                    //     $statusMsg = "Upload failed! ".$errorMsg; 
                    // } 
                // }else{ 
                //     $statusMsg = 'Please select a file to upload.'; 
                // } 
            
            


            
        }else{
            echo "Error description: " . mysqli_error($con);
             
        }
    
        

    }

?>
            </div>
        </div>
    </div>
</section>

 
<?php 
 
include("../inc/footer.php"); 

?>
