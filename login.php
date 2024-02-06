
<?php 

include("inc/db.php"); 
include("inc/user_header.php"); 
// include("inc/nav.php"); 

?>






<section class="main_index" style="padding: 5%;">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="loginPage">
					<div class="text-center mb-3">
						<a href="index.php" class="logo-brand">Soccer Stadium Management System</a>
					</div>
					<div class="row">
					<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card panel-login pt-3">
					<div class="panel-heading">
						<div class="row">
							<div class="col-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body p-5">
						<div class="row">
							<div class="col-lg-12">



											<?php



											if(isset($_POST['login-submit']))
											{
												$email=$_POST['email'];
												$password=$_POST['password'];
											{
												$result = mysqli_query($con,"SELECT * FROM user_login WHERE email = '$email' and pass='$password'");
												
												$row = mysqli_fetch_array($result);
												$count = mysqli_num_rows($result);				
													if ($count == 0) 
														{
														echo "<script>alert('Please check your username and password!'); window.location='login.php'</script>";
														} 
													else if ($count > 0)
														{
															session_start();
															$_SESSION['id'] = $row['id'];
															header("location:home.php"); 
														}
											}				
											}




											?>
								<form id="login-form" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In as User">
											</div>
										</div>
									</div> 
								</form>
 
								<form id="register-form" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now as User">
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
				<div class="text-center mt-3">
					<a href="owner/login.php" class="toOwner">Login as a Stadium Owner</a>
				</div>
			</div>
            <div class="col-md-3"></div>
					</div>
				
				</div>
			</div>
        </div>
    </div>
</section>

 

<?php 
//Register a User 
if(isset($_POST['register-submit']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password']; 

	// check if there is another user going to register with the same email address
	$getUsersEmails = mysqli_query($con,"SELECT * FROM user_login WHERE email = '$email'");

	//Validate now
	$totalCounts = mysqli_num_rows($getUsersEmails);
	if($totalCounts == 0){
		$insertOwner= mysqli_query($con,"INSERT INTO user_login (username,email,pass)
		VALUES ('$username','$email','$pass')");

		if($insertOwner){ 
			echo "<script>alert('You are Registered');</script>";
		}else{
			echo "Error description: " . mysqli_error($con);

		}
	}else{
		echo "<script>alert('Email: ".$email." is already registered');</script>";
	}

    



}

?>




<style>
	footer{
		display:none;
	}
</style>


<?php 

include("inc/user_footer.php"); 

?>
