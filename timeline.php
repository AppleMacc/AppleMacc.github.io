<?php
  include("config.php");
    // session class
    if(!isset($_SESSION))
    {
        session_start();
    }


    // check if there is a user logged in
    if (!isset($_SESSION['loggedin']))
    {
        header('Location: index.php');
        exit();
    }

    // include the database script


    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //$result = mysqli_query($con,"SELECT * FROM employees");
    $result = mysqli_query($con,"SELECT * FROM employees WHERE TEAM_MEMBER ='". $_SESSION['username'] ."'");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blue Pearl Admin - Timeline</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel ="icon" href="img/logo2.png" type="image/x-icon">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://unpkg.com/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="fullcalendar/core/main.min.css" rel="stylesheet" />
  <link href="fullcalendar/daygrid/main.min.css" rel="stylesheet" />
  <link href="fullcalendar/bootstrap/main.min.css" rel="stylesheet" />


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
         <div class="sidebar-brand-icon rotate-n-15"><img height="42" width="42" src="img/logo2.png"></div>
         <div class="sidebar-brand-text mx-3">Blue Pearl Admin </div>
      </a>
      <div class="sidebar-heading">Dashboard</div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Types Of Dashboards:</h6>
            <a class="collapse-item" href="admin.php">Planning Dashboard</a>
            <a class="collapse-item" href="actionDash.php">Action Items Dashboard</a>
          </div>
          </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Planning Timesheet</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tableAction.php">
          <i class="fas fa-border-none"></i>
          <span>Action Timesheet</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="timeline.php">
          <i class="fas fa-stream"></i>
          <span>Planning Timeline</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="timelineAction.php">
          <i class="fas fa-heartbeat"></i>
          <span>Action Timeline</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="feedback.php">
          <i class="far fa-comment-alt"></i>
          <span>Product Feedback</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

	<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <!-- div class="small text-gray-500">December 12, 2019</div -->
                  <span class="font-weight-bold">feature currently not available</span>
                </div>
              </a>
              <!--a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a -->
            </div>
            </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['username']?></span>
              <i class="fas fa-user-circle"><img class=""></i>
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
      <!-- End of Topbar -->
		<!-- Begin Page Content -->
    <div class="container-fluid">
		  <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Planning Timeline</h1>
      <p class="mb-4"></p>
      <div class="card shadow mb-4">
         <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
	       <div id="calendar"></div>
         </div>
     </div>
	  </div>
	 </div>
	 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; http://www.bluepearl.co.za </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
	</div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
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
  <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <!--script src="https://unpkg.com/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script-->
  <script src="js/core/main.min.js"></script>
  <script src="js/daygrid/main.min.js"></script>
  <script src="js/bootstrap/main.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var el = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(el,{
          plugins: ['dayGrid','bootstrap'],
          themeSystem: 'bootstrap',
          weekNumbers: true,
          eventLimit: true,
          events: [
            <?php
             foreach($result as $row)
             {
            ?>
            {

                title: "<?php echo "".$row['PROJECT']."\\n Budget: ".$row['BUDGET_HR']." Hours" ; ?>",
                start: "<?php echo "".$row['DA_TE']."" ; ?>"
            },
            <?php
             }
             ?>
          ],
          header: {
            left: 'prevYear,prev,next,nextYear today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
          },
          footer:{
            left: 'prevYear,prev,next,nextYear today',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
          }
        })
      calendar.render();
    });
  </script>

</body>
</html>
