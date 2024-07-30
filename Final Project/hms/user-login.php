<?php session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$puname=$_POST['username'];	
$ppwd=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$pid=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
header("location:dashboard.php");
}
else
{
// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('$puname','$uip','$status')");

echo "<script>alert('Invalid username or password');</script>";
echo "<script>window.location.href='user-login.php'</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>IITG-HMS | User-Login</title>
		<link rel="icon" href="assets\images\iitg.png" type="image/png">

		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

		<style>
        body {
            background-image: url('assets/images/iitg4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    	</style>
	</head>
	
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				

				</div>

				<div class="box-login" >
					<form class="form-login" method="post" >
					<img src="assets\images\iitg.png" alt="IITG Logo" class="center-image" style="width: 100px; height: 100px;">
					<a href="../index.php"><h1 style="color: #003366; font-weight: bold;"> IITG-HMS | Patient Login</h1></a>
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your Email and Password to Log In.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="username" placeholder="Email" required>
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i>
									 </span><a href="forgot-password.php">
									Forgot Password ?
								</a>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Log in <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="registration.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						</span><span class="text-bold text-uppercase"> IITG- HMS</span>.
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- <script src="vendor/jquery-validation/jquery.validate.min.js"></script> -->
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>