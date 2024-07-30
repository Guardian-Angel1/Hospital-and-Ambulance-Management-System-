<?php  
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
{
    
    $bookingnum = $_GET['bookingnum'];
    $remark = $_POST['remark']; 
    $status = $_POST['status'];
 $ambregno2=$_POST['ambregno'];

if($ambregno2!=''):
     $ambulanceregnum = $_POST['ambregno'];
       else:
   $ambulanceregnum = $_POST['ambulanceregnum'];
       endif; 
//        echo $ambulanceregnum;
// exit();
    $updateQuery1 = mysqli_query($con, "UPDATE tblambulance SET status='$status' WHERE AmbRegNum='$ambulanceregnum'");
   $updateQuery2= mysqli_query($con, "UPDATE tblambulancehiring SET Status='$status', Remark='$remark', AmbulanceRegNo='$ambulanceregnum' WHERE BookingNumber='$bookingnum'");
   $insertQuery = mysqli_query($con, "INSERT INTO tbltrackinghistory(BookingNumber, AmbulanceRegNum, Remark, Status) VALUES ('$bookingnum', '$ambulanceregnum', '$remark', '$status')");

    if ($updateQuery1 && $updateQuery2 && $insertQuery) {
        echo '<script>alert("Request Status Has been updated.")</script>';
        echo "<script type='text/javascript'> document.location ='all-amublance-request.php'; </script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
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

    <title>IITG-AMS || Booking Details</title>
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
  <h3><strong> Booking Details for an Ambulance</strong></h3>
    </div>
    <div>
<?php
$id = $_GET['id'];   
$ret = mysqli_query($con, "SELECT * FROM tblambulancehiring WHERE ID = '$id'");


while ($row = mysqli_fetch_array($ret)) {
   $arnum = $row['AmbulanceRegNo'];
?>
<table border="1" class="table table-bordered mg-b-0">
    <tr align="center">
        <th colspan="6" style="font-size:20px;color:blue;text-align: center;">
            View Request Details of #<?php echo $row['BookingNumber']; ?></th>
        
    </tr>
    <tr>
        <th>Patient Name</th>
        <td><?php echo $row['PatientName']; ?></td>
        <th>Relative Name</th>
        <td><?php echo $row['RelativeName']; ?></td>
    </tr>
    <tr>
    <th>Relative Contact Number</th>
    <td><?php  echo $row['RelativeConNum'];?></td>
    <th>Hiring Date</th>
    <td><?php  echo $row['HiringDate'];?></td>
    
  </tr>
  <tr>
    <th>Hiring Time</th>
    <td><?php  echo $row['HiringTime'];?></td>
     <th>Booking Date</th>
     <td><?php  echo $row['BookingDate'];?></td>
     <tr>
        <tr>
    <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
    <th>City</th>
    <td><?php  echo $row['City'];?></td>
  </tr>
   <tr>
    <th>State</th>
    <td><?php  echo $row['State'];?></td>
    <th>Message</th>
    <td><?php  echo $row['Message'];?></td>
  </tr>
    <!-- Display other request details -->

    <?php
    $atype = $row['AmbulanceType'];  
    $ambulanceTypeText = "";
    switch ($atype) {
        case "1":
            $ambulanceTypeText = "Basic Life Support (BLS) Ambulances";
            break;
        case "2":
            $ambulanceTypeText = "Advanced Life Support (ALS) Ambulances";
            break;
        case "3":
            $ambulanceTypeText = "Non-Emergency Patient Transport Ambulances";
            break;
        default:
            $ambulanceTypeText = "Unknown";
            break;
    }
    ?>
    <tr>
        <th>Ambulance Type</th>
        <td colspan="3"><?php echo $ambulanceTypeText; ?></td>
    </tr>
    <!-- Display other request details -->

    <?php if ($row['Remark'] != ''): ?>
    <tr>
        <th>Remark</th>
        <td><?php echo $row['Remark']; ?></td>
        <?php if ($row['Status'] != ''): ?>
        <th>Status</th>
        <td><?php echo $row['Status']; ?></td>
        <?php endif; ?>
    </tr>
    <?php endif; ?>
</table>

<?php
}
?>

<?php 
  $bookingnum=$_GET['bookingnum'];
$query1=mysqli_query($con,"SELECT Remark,Status,UpdationDate,BookingNumber,AmbulanceRegNum FROM tbltrackinghistory

    where BookingNumber='$bookingnum'");
$count=mysqli_num_rows($query1);
if($count>0){
     ?>
 <div class="col-12">
        <table class="table table-bordered" border="1" width="100%">
                                        <tr>
                                            <th colspan="6" style="text-align:center;">Tracking History</th>
                                        </tr>
                                        <tr>
                                            <th>Remark</th>
                                            <th>Status</th>
                                            <th>Ambulance Registration Number </th>
                                            <th>Action Date</th>
                                        </tr>
<?php 
while($row1=mysqli_fetch_array($query1))
{
?>  

<tr>
<td><?php echo htmlentities($row1['Remark']);?></td>
                 <td> <?php   $pstatus=$row1['Status'];  
                 if($pstatus==""){ ?>
<span class="badge badge-info">New</span>
 <?php } elseif($pstatus=="Assigned"){ ?>
<span  class="badge badge-primary">Assigned</span>
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
<td><?php echo htmlentities($row1['AmbulanceRegNum']);?></td>
<td><?php echo htmlentities($row1['UpdationDate']);?></td>
             
</tr>
<?php } ?>

</table></div>
<?php } ?>

 <?php if($pstatus=="" || $pstatus=="Assigned" || $pstatus=="On the way" || $pstatus=="Pickup"){ ?>
<table border="1" class="table table-bordered mg-b-0">
   
    <tr><td colspan="6" style="font-size:18px;text-align: center;color: blue;">Administrator Work</td></tr>

<form method="post" name="submit">

 <input type="hidden" name="ambregno" value="<?php echo $arnum;?>">
  <tr>
    <th>Status :</th>
    <td> <select class=" form-control" id="status" name="status" type="text" required="true" value="">
      <option value=""> Choose Status</option>
   <?php if ($pstatus == ""): ?>
    <option value="Assigned">Assigned</option>
    <option value="Rejected">Rejected</option>
<?php elseif ($pstatus == 'Assigned'): ?>
    <option value="On the way">On the way</option>
<?php elseif ($pstatus == 'On the way'): ?>
    <option value="Pickup">Pick Patient</option>
<?php elseif ($pstatus == 'Pickup'): ?>
    <option value="Reached">Reached</option>
<?php endif; ?>
</select>
    </td>
  </tr>
  <tr id="assign">
    <th>Assign To :</th>
    <td>
   <select name="ambulanceregnum" id="ambulanceregnum" class="form-control wd-450" >

<option value="">Select</option>
     <?php $query=mysqli_query($con,"select * from tblambulance where Status is null || Status='Reached'");
              while($row3=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row3['AmbRegNum'];?>"><?php   $atype=$row3['AmbulanceType'];  
                 if($atype=="1"){ ?>
                  <p>Basic Life Support (BLS) Ambulances</p>
                <?php } elseif($atype=="2"){ ?>
                  <p>Advanced Life Support (ALS) Ambulances</p>
                <?php } elseif($atype=="3"){ ?>
                   <p>Non-Emergency Patient Transport Ambulances</p>
                   <?php } elseif($atype=="4"){ ?>
                     <!-- <p>Boat Ambulance</p> -->
                     <?php } ?>(<?php echo $row3['AmbRegNum'];?>)</option>
                  <?php } ?> 
     
   </select></td>
  </tr>
  <tr>
    <th>Remark :</th>
    <td><textarea class="form-control" required name="remark"></textarea></td>
  </tr>


  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Update</button></td>
  </tr>
  </form>


<?php }  ?>

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
    <script src="js/jquery.scrollTo.js"></script>
<script type="text/javascript">

  $('#assign').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Assigned')
  {
  $('#assign').show();
  jQuery("#ambulanceregnum").prop('required',true);  
  }
  else{
  $('#assign').hide();
  }
})}) 
</script>

</body>

</html>
<?php }  ?>