<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      
      echo "<script>alert('Invalid Details. Please try again.');</script>";
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

    <title>IITG AMS - Forgot Password</title>
    <link rel="icon" href="img\iitg.png" type="image/png">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image">
                            <img src="img/iitg4.jpg" alt="Forgot-password Image" class="login-image">
                            </div>
                            
                        <style>
                            .bg-password-image {
                                position: relative;
                                width: 100%;
                                height: 60vh; /* Adjust height as needed */
                                overflow: hidden;
                            }
                            .bg-password-image .login-image {
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
                                        <h1 class="h4 text-gray-900 mb-2">Admin | Forgot Password</h1>

<!-- 
                                        <form action="#" method="post" name="submit">
		
                                                <input type="email" class="ggg" name="email" placeholder="Email" required="true">
                                        <input class="ggg"  type="text" name="contactno" required="" placeholder="Mobile Number">
                                                
                                                
                                                
                                                    <div class="clearfix"></div>
                                                    <input type="submit" value="Reset" name="submit">
                                            </form>
                                            <p><a href="login.php" style="color:#000;">Sign In</a></p> -->


<!-- 
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p> -->
                                    </div>
                                    <form class="user" action="#" method="post" name="submit">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="contactno"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Mobile Number..." required="">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Reset" name="submit">
                                        <hr>
                                        <div class="text-center">
                                        <p><a href="login.php" style="color:#000;">Sign In</a></p>
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