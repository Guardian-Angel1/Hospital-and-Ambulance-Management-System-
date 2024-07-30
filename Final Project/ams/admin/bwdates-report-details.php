<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ewmsaid']==0)) {
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

    <title>IITG-AMS|| B/w Dates Report Details</title>
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
    
   
   
    <div><?php $fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$fdate = date("d-m-Y", strtotime($fromdate));
$tdate = date("d-m-Y", strtotime($todate));
?>
<div class="panel-heading">
            B/w Dates Report Details From <?php echo $fdate;?> To <?php echo $tdate;?></div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Food Id</th>
            <th>Register By</th>
            <th>Register Mobile Number</th>
            <th>Contact Person Number</th>
            <th>Contact Person Mobile Number</th>
            <th>Food Items</th>
            <th>Request Date</th>
            <th>Status</th>
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <?php
$ret=mysqli_query($con,"select tblfood.ID,tblfood.foodId,tblfood.ContactPerson,tblfood.CPMobNumber,tblfood.CreationDate,tblfood.FoodItems,tbldonor.FullName,tbldonor.MobileNumber from  tblfood join tbldonor on tblfood.DonorID=tbldonor.ID where date(tblfood.CreationDate) between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['foodId'];?></td>
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['ContactPerson'];?></td>
                  <td><?php  echo $row['CPMobNumber'];?></td>
                  <td><?php  echo $row['FoodItems'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                   <?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?>
                  <td><a href="view-requestdetails.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
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
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
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