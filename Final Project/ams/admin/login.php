<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['eahpaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    echo "<script>alert('Invalid Details.');</script>";
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

    <title>IITG AMS- Login</title>
    <link rel="icon" href="img\iitg.png" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="img/iitg4.jpg" alt="Login Image" class="login-image">
                        </div>

                        <style>
                            .bg-login-image {
                                position: relative;
                                width: 100%;
                                height: 60vh; /* Adjust height as needed */
                                overflow: hidden;
                            }
                            .bg-login-image .login-image {
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
                                        <h1 class="h4 text-gray-900 mb-4">Admin! <br>Sign In Now</h1>
                                    </div>



                                    <!-- <form action="#" method="post" name="login">
			
                                        <input type="text" class="ggg" name="username" placeholder="User Name" required="true">
                                        <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="true">
                                        
                                        <a href="forgot-password.php">Forgot Password?</a>
                                            <div class="clearfix"></div>
                                            <input type="submit" value="Sign In" name="login">
                                    </form> -->


                                    <form class="user" action="#" method="post" name="login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"  name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"  name="password"
                                                id="exampleInputPassword" placeholder="Password"   required="true">
                                        </div>

                                        <div class="text-center">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Sign In" name="login">
</div>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                      
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a> -->
                                        <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <p class="mb-1">
   
     <i class="fa fa-home" aria-hidden="true" style="color:#000;"><a href="../../index.php" style="color:#000;">Home Page</a></i>
      </p>
                                   
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