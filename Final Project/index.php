<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit'])) {
    
    $bookingnum = mt_rand(100000000, 999999999);
    $pname = $_POST['pname'];
    $rname = $_POST['rname'];
    $phone = $_POST['phone'];
    $hdate = $_POST['hdate'];
    $htime = $_POST['htime'];
    $ambulancetype = $_POST['ambulancetype'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $message = $_POST['message'];
   
    $query = mysqli_query($con, "INSERT INTO tblambulancehiring (BookingNumber, PatientName, RelativeName, RelativeConNum, HiringDate, HiringTime, AmbulanceType, Address, City, State, Message) VALUES ('$bookingnum', '$pname', '$rname', '$phone', '$hdate', '$htime', '$ambulancetype', '$address', '$city', '$state', '$message')");

    if ($query) {
        echo "<script>alert('Your request has been sent successfully. Your Booking Number is: $bookingnum');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>IIT Guwahati Hospital</title>
  <link rel="icon" href="assets/img/iitgams.png" type="image/png">
</head>

  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <?php include_once('includes/header.php');?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="2000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slidee-1.jpg)">
          <div class="container">
            <h2>Welcome to <span>IIT Guwahati Hospital</span></h2>
  
            <a href="#query" class="btn-get-started scrollto">Query!</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slidee-2.jpg)">
          <div class="container">
            <h2>Emergency! <span>Book an Ambulance</h2>
        
            <a href="#appointment" class="btn-get-started scrollto">Hire Ambulance</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slidee-3.jpg)">
          <div class="container">
            <h2>Existing User! <span>See Login Options</h2>
            <a href="#login-section" class="btn-get-started scrollto">Login Options</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

   

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>In an emergency? Need help now?</h3>
          <a class="cta-btn scrollto" href="#appointment">Hire an Ambulance</a>
        </div>

      </div>
    </section>
    <!-- End Cta Section  -->



    

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Hire an Ambulance</h2>
        </div>

        <form action="" method="post" role="form" class="form-control" data-aos="fade-up" data-aos-delay="100">
          <div class="row" style="padding-top:20px">
            <div class="col-md-4 form-group">
              <input type="text" name="pname" class="form-control" id="pname" placeholder="Enter Patient Name" required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="rname" class="form-control" id="rname" placeholder="Enter Relative Name" required>
            </div>
           
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Relative Phone Number" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="hdate" class="form-control datepicker" id="hdate" placeholder="Hiring Date" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="time" name="htime" class="form-control datepicker" id="htime" placeholder="Hiring Time" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="ambulancetype" id="ambulancetype" class="form-select">
                <option value="">Select Type of Ambulance</option>
                <option value="1">Basic Life Support (BLS) Ambulances</option>
                <option value="2"> Advanced Life Support (ALS) Ambulances</option>
                <option value="3">Non-Emergency Patient Transport Ambulances</option>
                
               
              </select>
            </div>
          </div>
           <div class="row" style="padding-top:20px">
            <div class="col-md-4 form-group">
              <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
            </div>
           
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" required>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
         
          <div class="text-center" style="padding-top: 20px;padding-bottom: 20px;"><button type="submit"  name="submit" class="btn btn-primary">Submit</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->


       <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
          <div class="section-title">
          <h2>Our Services</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Life Support</a></h4>
         
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
        <div class="icon"><i class="fas fa-ambulance"></i></div>
        <h4 class="title"><a href="">Ambulance Support</a></h4>
    </div>
</div>


          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-thermometer"></i></div>
              <h4 class="title"><a href="">Emergency Kit</a></h4>
         
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
        <div class="icon"><i class="fas fa-user-md"></i></div>
        <h4 class="title"><a href="">Doctor Aid </a></h4>
    </div>
</div>



        </div>

      </div>
    </section>
    <!-- End Featured Services Section -->
<!-- Login Section starts-->



<section id="login-section" class="login-section">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
          <h2>Logins</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-user"></i></div>
                    <h4 class="title"><a href="hms/user-login.php">Patient Login</a></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-user-md"></i></div>
                    <h4 class="title"><a href="hms/doctor">Doctor Login</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .login-section .icon-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 30px;
        background: #fff;
        box-shadow: 0px 0 25px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    .login-section .icon-box .icon {
        font-size: 40px;
        color: green;
        margin-bottom: 10px;
    }
    .login-section .icon-box .title {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 18px;
    }
</style>














<!-- Login Section Ends-->
     
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <p><?php  echo $row['PageDescription'];?></p><?php } ?>
        </div>

      

      </div>
      </section>
    <!-- End About Us Section -->

    



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>

      </div>
<!-- Query Button with Text Above -->
<section id="query" class="queryj">
<div class="row mt-4">
  <div class="col-md-12 text-center">
    <p><strong>Have a query, click here!</strong></p>
    <a href="query.php" class="btn btn-primary">Query</a>
  </div>
</div>
</section>

  

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

             <div class="row">
              <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p><?php  echo $row['PageDescription'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?php  echo $row['Email'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><?php  echo 0; echo $row['MobileNumber'];?></p>
                </div>
              </div><?php } ?>
            </div>

           

        </div>

      </div>
    </section><!-- End Contact Section -->


<!-- Start Admin Section -->




<section id="admin-login-section" class="admin-login-section">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Admin Logins</h2>
        </div>     
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="icon-box small-icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-hospital"></i></div>
                    <h4 class="title"><a href="hms/admin/index.php">Hospital Admin</a></h4>
                </div>
            </div>
            <div class="col-md-2">
                <div class="icon-box small-icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-ambulance"></i></div>
                    <h4 class="title"><a href="ams\admin\login.php">Ambulance Admin</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .admin-login-section .icon-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 30px;
        background: #fff;
        box-shadow: 0px 0 25px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    .admin-login-section .icon-box .icon {
        font-size: 40px;
        color: green;
        margin-bottom: 10px;
    }
    .admin-login-section .icon-box .title {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 18px;
    }
    .admin-login-section .small-icon-box {
        padding: 20px;
    }
    .admin-login-section .small-icon-box .icon {
        font-size: 30px;
        color: blue;
    }
    .admin-login-section .small-icon-box .title {
        font-size: 16px;
    }
</style>









<!-- End Admin Section -->
  </main><!-- End #main -->

  <?php include_once('includes/footer.php');?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>