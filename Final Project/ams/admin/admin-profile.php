<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['eahpaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    echo "<script>alert('Profile details updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'admin-profile.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
  }
  ?>

<!DOCTYPE html>

<head>
<title>IITG AMS || Admin Profile  </title>
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

        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                <?php include_once('includes/header.php');?>

                <div class="container">
                    <section class="wrapper">
                        <div class="form-w3layouts">
                            <!-- Page Start -->
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            <h4>Admin Profile</h4>
                                        </header>
                                        <div class="panel-body">
                                            <div class="form">
                                                <?php
                                                $adminid=$_SESSION['eahpaid'];
                                                $ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
                                                while ($row=mysqli_fetch_array($ret)) {
                                                ?>
                                                <form class="cmxform form-horizontal" method="post" action="">
                                                    <div class="form-group">
                                                        <label for="adminname" class="control-label col-lg-3">Admin Name</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" id="adminname" name="adminname" type="text" value="<?php echo $row['AdminName'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lastname" class="control-label col-lg-3">User Name</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" id="username" name="username" type="text" value="<?php echo $row['UserName'];?>" required="true" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username" class="control-label col-lg-3">Contact Number</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" id="contactnumber" name="contactnumber" type="text" value="<?php echo $row['MobileNumber'];?>" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="control-label col-lg-3">Email</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" id="email" name="email" type="email" value="<?php echo $row['Email'];?>" required="true" readonly="true">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-3 col-lg-9">
                                                            <p style="text-align: center;">
                                                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!-- Page End -->
                        </div>
                    </section>
                </div>

                <!-- Footer -->
                <?php include_once('includes/footer.php');?>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php } ?>
