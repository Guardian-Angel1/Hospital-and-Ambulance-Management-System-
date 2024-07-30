<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon">
        <img src="img\iitg.png" alt="Icon" class="brand-image">
    </div>
    <div class="sidebar-brand-text mx-3">IITG- AMS <sup></sup></div>
</a>

<style>
    .sidebar-brand-icon {
        width: 40px; /* Adjust the size as needed */
        height: 40px; /* Adjust the size as needed */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sidebar-brand-icon .brand-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
</style>


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Control Panel
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-ambulance"></i>
<span>Ambulance</span>

    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><em>Ambulance:</em></h6>
            <a class="collapse-item" href="add-ambulance.php">Add Ambulance</a>
            <a class="collapse-item" href="manage-ambulance.php">Manage Ambulance</a>
        </div>
    </div>
</li>






<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwot"
        aria-expanded="true" aria-controls="collapseTwot">
        <i class="fas fa-fw fa-spinner"></i> <!-- Spinner icon -->
<span>Requests Progress</span>

    </a>
    <div id="collapseTwot" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><em>Ambulance Request:</em></h6>
            <a class="collapse-item" href="new-ambulance-request.php">New Request</a>
            <a class="collapse-item" href="assign-ambulance-request.php">Assigned Request</a>
            <a class="collapse-item" href="rejected-ambulance-request.php">Request Not Accepted </a>
            <a class="collapse-item" href="ontheway-ambulance-request.php">On The Way</a>
            <a class="collapse-item" href="pickup-ambulance-request.php">Pickup</a>
            <a class="collapse-item" href="reached-ambulance-request.php">Reached Hospital</a>
            <a class="collapse-item" href="all-amublance-request.php">All Request</a>
        </div>
    </div>
</li>










<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-file-alt"></i>
<span>Content</span>

    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><em>Content</em></h6>
            <a class="collapse-item" href="about-us.php">About Us</a>
            <a class="collapse-item" href="contact-us.php">Contact Us</a>
        </div>
    </div>
</li>




<li class="nav-item">
    <a class="nav-link" href="ambulance-request-report.php">
    <i class="far fa-fw fa-calendar-alt"></i>
<span>Requests By Date</span>
</li>

























<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->
<li class="nav-item">
    <a class="nav-link" href="search.php">
    <i class="fas fa-fw fa-search"></i>
<span>Search Request</span>

</li>
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="dashboard.php">
        <i class=""></i>
        <span></span></a>
</li>




<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->
