<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>

  

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IITG AMS | Reset Password</title>
    <link rel="icon" href="img\iitg.png" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-reset-image">
                            <img src="img/iitg4.jpg" alt="Reset-password Image" class="login-image">
                            </div>

                        <style>
                            .bg-reset-image {
                                position: relative;
                                width: 100%;
                                height: 60vh; /* Adjust height as needed */
                                overflow: hidden;
                            }
                            .bg-reset-image .login-image {
                                position: relative;
                                left: 0;
                                width: 230%; /* Adjust slide of image */
                                height: 100%;
                                object-fit: cover;
                            }
                        </style>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <br>
                                        <h1 class="h4 text-gray-900 mb-2">Admin | Recover Password</h1>



                                   




                                       
                                    <form class="user" action="" method="post" name="changepassword"   onsubmit="return checkpass();">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="newpassword"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="confirmpassword"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Confirm Your Password" required="true">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Reset" name="submit">
                                        <hr>
                                        <div class="text-center">
                                        <p><a href="login.php" style="color:#000;">Sign In</a></p>
                                        <p class="mb-1">
                                    
                                    <i class="fa fa-home" aria-hidden="true" style="color:#000;"><a href="../../index.php" style="color:#000;">Home Page</a></i>
                                    </p>
                                        </div>
                                        <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </a> -->
                                    </form>
                                   
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.html">Already have an account? Login!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>