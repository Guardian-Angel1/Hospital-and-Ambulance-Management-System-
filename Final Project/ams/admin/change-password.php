<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['eahpaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['eahpaid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $query = mysqli_query($con, "select ID from tbladmin where ID='$adminid' and Password='$cpassword'");
        $row = mysqli_fetch_array($query);
        if ($row > 0) {
            $ret = mysqli_query($con, "update tbladmin set Password='$newpassword' where ID='$adminid'");
            echo '<script>alert("Your password successfully changed.")</script>';
        } else {
            echo '<script>alert("Your current password is wrong.")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>IITG-AMS || Change Password</title>
    <link rel="icon" href="img\iitg.png" type="image/png">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
    function checkpass() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
            alert('New Password and Confirm Password field does not match');
            document.changepassword.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Header -->
                <?php include_once('includes/header.php'); ?>
                <section id="container">
                    <!--header start-->
                    <?php include_once('includes/header.php'); ?>
                    <!--header end-->
                    <!--sidebar start-->
                    <?php include_once('includes/sidebar.php'); ?>
                    <!--sidebar end-->
                    <!--main content start-->
                    <section id="main-content">
                        <section class="wrapper">
                            <div class="form-w3layouts">
                                <!-- page start-->
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <section class="panel">
                                            <header class="panel-heading text-center">
                                                <h4>Change Password</h4>
                                            </header>
                                            <div class="panel-body">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal" method="post" action="" name="changepassword" onsubmit="return checkpass();">
                                                        <div class="form-group">
                                                            <label for="adminname" class="control-label">Current Password:</label>
                                                            <div>
                                                                <input type="password" name="currentpassword" class="form-control" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lastname" class="control-label">New Password:</label>
                                                            <div>
                                                                <input type="password" name="newpassword" class="form-control" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="control-label">Confirm Password:</label>
                                                            <div>
                                                                <input type="password" name="confirmpassword" class="form-control" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button class="btn btn-primary" type="submit" name="submit">Change</button>
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
                    </section>
                    <!-- footer -->
                    <?php include_once('includes/footer.php'); ?>
                    <!-- / footer -->
                </section>
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
