<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } 













  // Data calc for Date-wise Ambulance Requests
$queryDateWise = mysqli_query($con, "SELECT DATE(BookingDate) as RequestDate, 
COUNT(ID) as NumberOfRequests,
SUM(CASE WHEN Status = 'Rejected' THEN 1 ELSE 0 END) as RejectedRequests,
(COUNT(ID) - SUM(CASE WHEN Status = 'Rejected' THEN 1 ELSE 0 END)) as FulfilledRequests
FROM tblambulancehiring
GROUP BY DATE(BookingDate)");
$dateWiseData = [];
while($row = mysqli_fetch_assoc($queryDateWise)) {
$dateWiseData[] = $row;
}
$jsonDateWiseData = json_encode($dateWiseData);


// Data calc for number of requests for types of Ambulances
$queryAmbulanceType = mysqli_query($con, "SELECT AmbulanceType, COUNT(ID) as TypeCount FROM tblambulancehiring GROUP BY AmbulanceType");
$ambulanceTypeData = [];
while($row = mysqli_fetch_assoc($queryAmbulanceType)) {
switch($row['AmbulanceType']) {
    case 1: $typeName = 'ALS'; break;
    case 2: $typeName = 'BLS'; break;
    case 3: $typeName = 'NEPT'; break;
    default: $typeName = 'Unknown';
}
$ambulanceTypeData[] = ['y' => $typeName, 'a' => $row['TypeCount']];
}
$jsonAmbulanceTypeData = json_encode($ambulanceTypeData);





// Data Calc for types of Ambulances
$queryAmbulanceInventory = mysqli_query($con, "SELECT AmbulanceType, COUNT(ID) as TypeCount FROM tblambulance GROUP BY AmbulanceType");
$ambulanceInventoryData = [];
while($row = mysqli_fetch_assoc($queryAmbulanceInventory)) {
$typeName = '';
switch($row['AmbulanceType']) {
    case 1:
        $typeName = 'Basic Life Support (BLS)';
        break;
    case 2:
        $typeName = 'Advanced Life Support (ALS)';
        break;
    case 3:
        $typeName = 'Non Emergency Patient Transfer (NEPT)';
        break;
    default:
        $typeName = 'Unknown Type';
}
$ambulanceInventoryData[] = ['label' => $typeName, 'value' => $row['TypeCount']];
}
$jsonAmbulanceInventoryData = json_encode($ambulanceInventoryData);

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IITG-AMS | Dashboard</title>
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



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="manage-ambulance.php"><h5>Total Ambulance</h5></a>
                        </div>
                        <?php 
                        $query1=mysqli_query($con,"Select * from  tblambulance");
                        $ambcnt=mysqli_num_rows($query1);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?php echo $ambcnt;?></h3></div>
                        <a href="manage-ambulance.php" style="color:black">View Details</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ambulance fa-3x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h5><a href="all-amublance-request.php">All Requests</a></h5>
                        </div>
                        <?php 
                        $query2=mysqli_query($con,"Select * from  tblambulancehiring");
                        $totalreq=mysqli_num_rows($query2);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?php echo $totalreq;?></h3></div>
                        <a href="all-amublance-request.php" style="color:black">View Details</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list-alt fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h5><a href="new-ambulance-request.php" >New  Request</a></h5></div>
                        <?php $query3=mysqli_query($con,"Select * from  tblambulancehiring where Status is null");
$newreq=mysqli_num_rows($query3); ?>

                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><h3><?php echo $newreq;?></h3></div>
                            </div>
                        </div>
                        <a href="new-ambulance-request.php" style="color:black">View Details</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-plus-circle fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="assign-ambulance-request.php"><h5>Assigned Request</h5></a></div>
                        <?php $query4=mysqli_query($con,"Select * from  tblambulancehiring where Status='Assigned'");
$assignedreq=mysqli_num_rows($query4);
?>
                        <h3><?php echo $assignedreq;?></h3>
                        <a href="assign-ambulance-request.php"style="color:black" >View Details</a></div>
                    
                    <div class="col-auto">
                        <i class="fas fa-tasks fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="ontheway-ambulance-request.php"><h5>On The Way  </h5></a>
                        </div>
                        <?php $query5=mysqli_query($con,"Select * from  tblambulancehiring where Status ='On the way'");
$otwreq=mysqli_num_rows($query5);
?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?php echo $otwreq;?></h3></div>
                        <a href="ontheway-ambulance-request.php" style="color:black">View Details</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-truck fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <a href="pickup-ambulance-request.php"><h5>Patient Picked </h5></a>
                        </div>
                        <?php $query6=mysqli_query($con,"Select * from  tblambulancehiring where Status ='Pickup'");
$pickupreq=mysqli_num_rows($query6);
?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?php echo $pickupreq;?></h3></div>
                        <a href="pickup-ambulance-request.php" style="color:black">View Details</a>                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="reached-ambulance-request.php"><h5>Patient Reached </h5></a></div>
                        <?php $query7=mysqli_query($con,"Select * from  tblambulancehiring where Status ='Reached'");
$reachedreq=mysqli_num_rows($query7);
?>

                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">						<h3><?php echo $reachedreq;?></h3></div>
                            </div>
                        </div>
                        <a href="reached-ambulance-request.php" style="color:black">View Details</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hospital fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="rejected-ambulance-request.php"><h5>Declined Request</h5></a></div>
                        <?php $query8=mysqli_query($con,"Select * from  tblambulancehiring where Status ='Rejected'");
$rejectedreq=mysqli_num_rows($query8);
?>
<h3><?php echo $rejectedreq;?></h3>
                <a href="rejected-ambulance-request.php" style="color:black">View Details</a></div>
                    
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




                    <section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			

		<div class="market-updates">
           
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			
		</div>
		<!-- //calendar -->
		<div class="col-md-6 w3agile-notifications">
			
			</div>
			<div class="clearfix"> </div>
		</div>
			<!-- tasks -->
			<div class="agile-last-grids">
				<div class="col-md-4 agile-last-left">
					
				</div>
				<div class="col-md-4 agile-last-left agile-last-middle">
					
				</div>
				<div class="col-md-4 agile-last-left agile-last-right">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		<!-- //tasks -->
		<div class="agileits-w3layouts-stats">
					<div class="col-md-4 stats-info widget">
						
					</div>
					<div class="col-md-8 stats-info stats-last widget-shadow">
						
					</div>
					<div class="clearfix"> </div>
				</div>
</section>
 <!-- footer -->
  <!-- / footer -->
</section>
<!--main content end-->
</section>

                        















<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
$(document).ready(function() {
    // Morris Line Chart for Date-wise Ambulance Requests
    Morris.Line({
        element: 'datewise-requests-chart',
        data: <?php echo $jsonDateWiseData; ?>,
        xkey: 'RequestDate',
        ykeys: ['NumberOfRequests', 'RejectedRequests', 'FulfilledRequests'],
        labels: ['Total Requests', 'Declined Requests', 'Fulfilled Requests'],
        lineColors: ['#0b62a4', '#E74C3C', '#2ECC71'],  // Blue for total, Red for rejected, Green for fulfilled
        lineWidth: 2,
        pointSize: 4,
        hideHover: 'auto',
        resize: true,
        xLabels: 'day',
        dateFormat: function (x) { return new Date(x).toLocaleDateString(); } // Formats the date for display
    });
});
</script>


<script>
$(document).ready(function() {
    Morris.Bar({
        element: 'ambulance-type-bar-chart',
        data: <?php echo $jsonAmbulanceTypeData; ?>,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Number of Requests'],
        barColors: function (row, series, type) {
            if(row.label == "ALS") return '#a6000b';
            else if(row.label == "BLS") return '#1ABC9C';
            else if(row.label == "NEPT") return '#9B59B6';
            else return '#BDC3C7'; // Default color for any unspecified type
        },
        resize: true,
        barSizeRatio: 0.5, // Adjusts the thickness of the bars, lower value = thinner bars
        barGap: 3, // Increases the gap between bars for a more compact look
        xLabelMargin: 10,
        xLabelAngle: 0,
        hideHover: 'auto'
    });
});
</script>





<script>
$(document).ready(function() {
    // Existing charts and code...

    // Morris Pie Chart for Ambulance Inventory by Type
    Morris.Donut({
        element: 'ambulance-inventory-chart',
        data: <?php echo $jsonAmbulanceInventoryData; ?>,
        colors: ['#3498DB', '#1ABC9C', '#F39C12'],
        resize: true,
        formatter: function (x) { return x + " units"; }
    });
});
</script>








                    <!-- Content Row -->
                    

                    <!-- Content Row -->

                  
				<div class="col-md-12 w3ls-graph">
    <div class="agileinfo-grap">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>Date-wise Ambulance Requests</h3>
            </header>
            <div class="agileits-box-body clearfix">
                <div id="datewise-requests-chart" style="height: 250px;"></div>
            </div>
        </div>
    </div>
</div>
                        <!-- Area Chart -->
            
<br>
<br>
<br>            
<br>            
<br>            
<div class="col-md-12 w3ls-graph">
    <div class="agileinfo-grap">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>Ambulance Requests by Type</h3>
            </header>
            <div class="agileits-box-body clearfix">
                <div id="ambulance-type-bar-chart" style="height: 250px;"></div>
            </enddiv>
        </div>
    </div>
</div>


<br>
<br>
<br>

<div class="col-md-12 w3ls-graph">
    <div class="agileinfo-grap">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>Ambulance Inventory by Type</h3>
            </header>
            <div class="agileits-box-body clearfix">
                <div id="ambulance-inventory-chart" style="height: 250px;"></div>
            </div>
        </div>
    </div>
</div>

                        <!-- Pie Chart -->
                        
                    <!-- Content Row -->
                    

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
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













    <script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
</body>

</html>