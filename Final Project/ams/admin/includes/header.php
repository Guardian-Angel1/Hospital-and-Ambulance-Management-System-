 
 <?php

error_reporting(0);
include('includes/dbconnection.php');
?>

         
        <!-- settings start -->
              <!-- inbox dropdown start -->
                
<?php
$ret1=mysqli_query($con,"select * from tblambulancehiring where   (tblambulancehiring.Status is null || tblambulancehiring.Status='')");
 $num=mysqli_num_rows($ret1);
 
 ?>  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

   




    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter"><?php echo $num;?></span>
        </a>




        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h4 class="dropdown-header">
                <p class="red">You received <?php echo $num;?> New Request</p>
            </h4>
            <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
?>
            <a class="dropdown-item d-flex align-items-center" href="booking-details.php?id=<?php echo $result['ID'];?>&&bookingnum=<?php echo $result['BookingNumber'];?>">
               
                <div class="font-weight-bold">
                    <div class="text-truncate">New Request From <?php echo $result['PatientName'];?> </div>
                    <div class="small text-gray-500">(<?php echo $result['BookingNumber'];?>)</div>
                </div>
                
            </a>
            <?php } }  
else {?>
 <li>  No New Request Received</li>
 <?php } ?>



            
            <a class="dropdown-item text-center small text-gray-500" href="new-ambulance-request.php">See All Requests</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>




    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            $adid=$_SESSION['eahpaid'];
            $ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
            $row=mysqli_fetch_array($ret);
            $name=$row['AdminName'];

            ?>
            <!-- <img alt="" src="images/2.png"> -->
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><h6><strong><?php echo $name; ?></strong></h6></span>
            <img class="img-profile rounded-circle"
                src="img\2.png">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="admin-profile.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="change-password.php">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
