<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
 $mobnum=$_POST['mobnum'];

 $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$mobnum' where  PageType='contactus'");

    if ($query) {
    echo "<script>alert('Contact Us has been updated.');</script>";
  }
  else
    {
       echo "<script>alert('Something went wrong. Please try again.');</script>";
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

    <title>IITG-AMS || Contact Us Page  </title>
    <link rel="icon" href="img\iitg.png" type="image/png">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        




            <!-- put sidebar here -->
            <?php include_once('includes/sidebar.php');?>










        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               




                <!-- put header here -->


                <?php include_once('includes/header.php');?>


                    <!-- Main Content Here -->



                    <section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
          
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           <h3><strong> Contact Us Page</strong></h3>
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                 
   
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <?php
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Page Title</label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="pagetitle" name="pagetitle" type="text" required="true" value="<?php  echo $row['PageTitle'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                   <label for="adminname" class="control-label col-lg-3">Email Address</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" id="email" value="<?php  echo $row['Email'];?>" class="form-control" required='true'>
                                    </div>
                                </div>
                                 <div class="form-group">
                                   <label for="adminname" class="control-label col-lg-3">Contact Number</label>
                                    <div class="col-sm-8">
                                       <input type="text" name="mobnum" id="mobnum" value="<?php  echo $row['MobileNumber'];?>" class="form-control" required='true' maxlength="10" pattern='[0-9]+'>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="adminname" class="control-label col-lg-3">Page Description
                                        </label>
                                        <div class="col-lg-8">
                                            <textarea class=" form-control" id="pagedes" rows="6" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>
                                        </div>
                                    </div>
                                    <?php } ?>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>

</section>
 <!-- footer -->
		  <?php include_once('includes/footer.php');?>    
  <!-- / footer -->
</section>

</section>








                    <!-- Main Content Ends Here -->

               <!-- Footer -->
<?php include_once('includes/footer.php');?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php }  ?>