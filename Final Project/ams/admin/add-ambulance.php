<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $ambulancetype = $_POST['ambulancetype'];
    $ambregnum = $_POST['ambregnum'];
    $dname = $_POST['dname'];
    $dconnum = $_POST['dconnum'];
    $ret=mysqli_query($con, "select AmbRegNum from tblambulance where AmbRegNum='$ambregnum'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo "<script>alert('This ambulance already registered');</script>";
    }
    else{
     
    $query=mysqli_query($con, "insert into tblambulance(AmbulanceType,AmbRegNum,DriverName,DriverContactNumber) value('$ambulancetype','$ambregnum','$dname','$dconnum')");
    if ($query) {
   
    echo "<script>alert('Ambulance detail added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-ambulance.php'; </script>";
  }
  else
    {

      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
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

    <title>IITG-AMS | Add Ambulance</title>
    <link rel="icon" href="img\iitg.png" type="image/png">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                <div class="col-lg-8 offset-lg-2">
                    <section class="panel">
                        <header class="panel-heading">
                            <h4><strong>Add Ambulance</strong></h4>
                            <!-- <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span> -->
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                

   
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Type of Ambulance</label>
                                        <div class="col-lg-6">
                                            
                                            <select name="ambulancetype" id="ambulancetype" class=" form-control">
                <option value="">Select Type of Ambulance</option>
                <option value="1">Basic Life Support (BLS) Ambulances</option>
                <option value="2"> Advanced Life Support (ALS) Ambulances</option>
                <option value="3">Non-Emergency Patient Transport Ambulances</option>
                
               
              </select>
                                        </div>

                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Ambulance Reg No.</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="ambregnum" name="ambregnum" type="text" required="true" value="">
                                            
                                        </div>
                                        
                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Driver Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="dname" name="dname" type="text" required="true" value="">
                                            
                                        </div>
                                        
                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Driver Contact Number</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="dconnum" name="dconnum" type="text" required="true" value="" maxlength="10" pattern="[0-9]+">
                                            
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Add</button></p>
                                           
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
<?php } ?>