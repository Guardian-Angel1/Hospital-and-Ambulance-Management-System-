<?php
include_once('hms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";

} ?>

<!DOCTYPE html>
<html lang="en">

<link rel="shortcut icon" href="query_assetsimages/fav.jpg">
    <link rel="stylesheet" href="query_assetscss/bootstrap.min.css">
    <link rel="stylesheet" href="query_assetscss/fontawsom-all.min.css">
     <link rel="stylesheet" href="query_assetscss/animate.css">
    <link rel="stylesheet" type="text/css" href="query_assetscss/style.css" />
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
 <section id="contact_us" class="contact-us-single">
    <div class="row no-margin">
        <div class="col-sm-12 cop-ck">
        <button class="nav-button" onclick="goToPage()">Go Home</button>

<script>
    function goToPage() {
        window.location.href = "index.php";
    }
</script>
            <form method="post">
                <h2>Query Form</h2>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label>Enter Name :</label></div>
                    <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="fullname" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label>Email Address :</label></div>
                    <div class="col-sm-8"><input type="email" name="emailid" placeholder="Enter Email Address" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label>Mobile Number:</label></div>
                    <div class="col-sm-8"><input type="text" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label>Enter Message:</label></div>
                    <div class="col-sm-8">
                        <textarea rows="5" placeholder="Enter Your Message" class="form-control input-sm" name="description" required></textarea>
                    </div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                        <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<style>
#contact_us {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 120px auto 0;
}

#contact_us h2 {
    text-align: center;
    margin-bottom: 20px;
}

.cf-ro {
    margin-bottom: 15px;
}

.cf-ro label {
    font-weight: bold;
}

.cf-ro input, .cf-ro textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
}

.cf-ro button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
}
</style>

    

</body>
<script src="query_assetsjs/jquery-3.2.1.min.js"></script>
<script src="query_assetsjs/popper.min.js"></script>
<script src="query_assetsjs/bootstrap.min.js"></script>
<script src="query_assetsplugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="query_assetsplugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="query_assetsplugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="query_assetsjs/script.js"></script>


</html>