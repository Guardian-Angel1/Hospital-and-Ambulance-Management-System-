<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IITG-AMS || Reached Ambulance Request</title>
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
        <h3><strong>Reached Ambulance Request </strong></h3>
    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Booking Number</th>
            <th>Patient Name</th>
            <th>Relative Contact Number</th>
            <th>Hiring Date/Time</th>
            <th>Request Date</th>
            <th>Status</th>
            <th data-breakpoints="xs">Action</th>
          </tr>
        </thead>
        <?php
      
        
$ret=mysqli_query($con,"select * from  tblambulancehiring  where tblambulancehiring.Status='Reached'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {
?>
        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['BookingNumber'];?></td>
              <td><?php  echo $row['PatientName'];?></td>
                  <td><?php  echo $row['RelativeConNum'];?></td>
                  <td><?php  echo $row['HiringDate'];?> : <?php  echo $row['HiringTime'];?></td>
                  <td><?php  echo $row['BookingDate'];?></td>

                                   <td> <?php   $pstatus=$row['Status'];  
                 if($pstatus==""){ ?>
<span class="badge badge-info">New</span>
 <?php } elseif($pstatus=="Assigned"){ ?>
<span } class="badge badge-primary">Assigned</span>
 <?php } elseif($pstatus=="On the way"){ ?>
<span class="badge badge-primary">On the Way</span>
 <?php } elseif($pstatus=="Pickup"){ ?>
<span class="badge badge-success">Patient Pick</span>
 <?php } elseif($pstatus=="Reached"){ ?>
<span class="badge badge-success">Patient Reached Hospital</span>
 <?php } elseif($pstatus=="Rejected"){ ?>
<span class="badge badge-success">Rejected</span>

<?php } ?>
</td>
                  <td><a href="booking-details.php?id=<?php echo $row['ID'];?>&&bookingnum=<?php echo $row['BookingNumber'];?>" class="btn btn-primary">View</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
  <th colspan="8" style="color:red">No Record Found</th>
</tr>
<?php } ?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
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