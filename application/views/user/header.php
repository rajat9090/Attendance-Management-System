<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Profile</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/ci_eas/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/ci_eas/assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/ci_eas/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="http://localhost/ci_eas/assets/css/custom.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    
      <!-- Sidebar - Brand -->
     
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
         
        </div>
        <div class="sidebar-brand-text mx-3">EAttendence</div>
      </a>
        
      


      <!-- Query Menu -->
      
        <div class="sidebar-heading">
          Attendance        </div>

                    <li class="nav-item">
            
            <a class="nav-link pb-0" href="<?php echo base_url('user/uhom/attend')?>">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Attendance Form</span></a>
            </li>

                      <li class="nav-item">
            
            <a class="nav-link pb-0" href="<?php echo base_url('user/uhom/history')?>">
              <i class="fas fa-fw fa-th-list"></i>
              <span>History</span></a>
            </li>

          
          <hr class="sidebar-divider mt-3">
        
        <div class="sidebar-heading">
          Profile        </div>

                    <li class="nav-item ">

            
            <a class="nav-link pb-0" href="<?php echo base_url('user/uhom/profile')?>">
              <i class="fas fa-fw fa-id-card"></i>
              <span>My Profile</span></a>
            </li>
            <li class="nav-item ">
            <a class="nav-link pb-0" href="<?php echo base_url('user/uhom/salary')?>">
              <i class="fa-sharp fa-solid fa-cash-register"></i>
              <span>My Salary</span></a>
            </li>

          
          <hr class="sidebar-divider mt-3">
          
                </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow py-1 px-3">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $pro['name'];?></span>
                <img class="img-profile rounded-circle border" src="<?= base_url('assets/empimg/') . $pro['image']; ?>?v=<?php echo time(); ?>">
              </a>
             
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>