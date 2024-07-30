<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_GET['del']))
{
  $rid=$_GET['del'];
  $query=mysqli_query($con,"delete from tblambulance  where ID='$rid'");
  echo "<script>alert('Data Deleted');</script>";
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

    <title>IITG-AMS || Manage Ambulance </title>
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
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
      <h3><strong>  Manage Ambulance</strong></h3>
    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Type of Ambulance</th>
            <th>Ambulance Reg No.</th>
             <th>Name of Driver</th>
              <th>Phone Number of Driver</th>
            <th>Creation Date</th>
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <?php
$ret=mysqli_query($con,"select * from  tblambulance");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
                  <td><?php echo $cnt;?></td>
                  <?php   $atype=$row['AmbulanceType'];  
                 if($atype=="1"){ ?>
                  <td>Basic Life Support (BLS) Ambulances</td>
                <?php } elseif($atype=="2"){ ?>
                  <td>Advanced Life Support (ALS) Ambulances</td>
                <?php } elseif($atype=="3"){ ?>
                   <td>Non-Emergency Patient Transport Ambulances</td>
                   <?php } elseif($atype=="4"){ ?>
                     <!-- <td>Boat Ambulance</td> -->
                     <?php } ?>
                 
                  <td><?php  echo $row['AmbRegNum'];?></td>
                  <td><?php  echo $row['DriverName'];?></td>
                  <td><?php  echo $row['DriverContactNumber'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="edit-ambulance.php?editid=<?php echo $row['ID'];?>" class="btn btn-primary">Edit</a> 
                    <a href="manage-ambulance.php?del=<?php echo $row['ID'];?>" class="btn btn-danger">Delete</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
  <!-- / footer -->
</section>

<!--main content end-->
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