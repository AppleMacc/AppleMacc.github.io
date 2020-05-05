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

	 $result = mysqli_query($con,"SELECT * FROM employees");


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blue Pearl Admin - Timesheet</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel ="icon" href="img/logo2.png" type="image/x-icon">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
      <li class="nav-item active">
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
      <li class="nav-item">
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
          <!-- / .main-navbar -->
          <?php if(isset($_SESSION['response'])){ ?>
          <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Success!</strong> <?= $_SESSION['response']; ?>
          </div>
        <?php } unset($_SESSION['response']); ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Timesheet</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Blue Pearl Timesheet</h6>
			  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addProjectModal"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Project</a>
			</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
  					<tr>
  					  <th>ID</th>
  					  <th width='15%'>Team Member</th>
  					  <th>Company</th>
  					  <th width='15%'>Project</th>
  					  <th width='15%'>Date</th>
  					  <th>Week</th>
  					  <th>Month</th>
  					  <th width='15%'>Budget (Mins)</th>
  					  <th width='15%'>Actual (Mins)</th>
  					  <th>Action</th>
  					</tr>
				  </thead>
          <tfoot>
  					<tr>
  					  <th>ID</th>
  					  <th width='15%'>Team Member</th>
  					  <th>Company</th>
  					  <th width='15%'>Project</th>
  					  <th width='15%'>Date</th>
  					  <th>Week</th>
  					  <th>Month</th>
  					  <th width='15%'>Budget (Mins)</th>
  					  <th width='15%'>Actual (Mins)</th>
  					  <th>Action</th>
  					</tr>
				  </tfoot>
          <tbody>
				  <?php
            while($fetch = mysqli_fetch_array($result)){
              ?>
              <tr>
	              <td> <?php echo $fetch['ID']; ?></td>
                <td> <?php echo $fetch['TEAM_MEMBER']; ?></td>
                <td> <?php echo $fetch['COMPANY']; ?></td>
                <td> <?php echo $fetch['PROJECT']; ?></td>
                <td> <?php echo $fetch['DA_TE']; ?></td>
                <td> <?php echo $fetch['WEEK']; ?></td>
                <td> <?php echo $fetch['MONTH']; ?></td>
    						<td> <?php echo $fetch['BUDGET_MIN']; ?></td>
    						<td> <?php echo $fetch['ACTUAL_MIN']; ?></td>
                <td width='10%'>
    							<a type="submit" id="<?php echo $fetch['ID']; ?>" class="view_btn text-primary" Title="view" data-toggle="tooltip"><i class="text-primary far fa-eye"></i></a>
    							<a type="submit" id="<?php echo $fetch['ID']; ?>" class="edit_btn text-primary" Title="edit" data-toggle="tooltip"><i class="text-primary fas fa-pencil-alt"></i></a>
		            </td>
              </tr>
            <?php
              }
	           ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
        <!-- /.container-fluid -->
</div>
      <!-- End of Main Content -->
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
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Add Modal HTML -->
  <div id="addProjectModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="addProjectHours.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Add Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">
              <div class="form-group">
               <label><b><i class="nc-icon nc-circle-10"></i> Team Member</b></label>
               <select name="TEAM_MEMBER" class="browser-default custom-select">
                <option selected>Please select</option>
                <option value="Abram"> Abram </option>
                <option value="Chaka"> Chaka </option>
                <option value="Donald"> Donald </option>
                <option value="Malcolm"> Malcolm </option>
               </select>
			  </div>
			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Project Name</b></label>
				 <input type="text" name="PROJECT" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label><b><i class="nc-icon nc-atom"></i>  Company</b></label>
                <select name="COMPANY" class="browser-default custom-select">
                 <option selected>Please select</option>
                 <option value="BLUE"> Blue </option>
                 <option value="BLUE PEARL"> Blue Pearl </option>
                </select>
			  </div>
			  <div class="form-group">
				 <label><b><i class="nc-icon nc-calendar-60"></i>  Date</b></label>
				 <input type="date" name="DA_TE" class="form-control datepicker" required>
			  </div>
			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Budget Minutes</b></label>
				 <input type="text" name="BUDGET_MIN" class="form-control" required>
			  </div>
			  <div class="form-group">
                 <label><b><i class="nc-icon  nc-watch-time"></i>  Actual Minutes</b></label>
                 <input type="text" name="ACTUAL_MIN" class="form-control" required>
              </div>
			</div>
			<div class="modal-footer">
			  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
			  <input type="submit" class="btn btn-success" value="Add">
			</div>
		</form>
	 </div>
   </div>
  </div>

  <!-- Edit Modal HTML -->
  <div id="editProjectModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="update.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Edit Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">
              <div class="form-group">
               <label><b><i class="nc-icon nc-circle-10"></i> Team Member</b></label>
               <select id="TEAM_MEMBER" name="TEAM_MEMBER" class="browser-default custom-select">
                <option selected="Please Select">Please Select</option>
                <option value="Abram"> Abram </option>
                <option value="Chaka"> Chaka </option>
                <option value="Donald"> Donald </option>
                <option value="Malcolm"> Malcolm </option>
               </select>
			  </div>
			  <div class="form-group">
				   <label><b><i class="nc-icon nc-badge"></i>   Project Name</b></label>
				   <input id="PROJECT" type="text" name="PROJECT" class="form-control" required>
			  </div>
			  <div class="form-group">
				    <label><b><i class="nc-icon nc-atom"></i>  Company</b></label>
            <select id="COMPANY" name="COMPANY" class="browser-default custom-select">
              <option selected="Please Select">Please Select</option>
              <option value="BLUE"> Blue </option>
              <option value="BLUE PEARL"> Blue Pearl </option>
            </select>
			  </div>
			  <div class="form-group">
				     <label><b><i class="nc-icon nc-calendar-60"></i>  Date</b></label>
				     <input id="DA_TE" type="date" name="DA_TE" class="form-control datepicker" required>
			  </div>
			  <div class="form-group">
				     <label><b><i class="nc-icon nc-time-alarm"></i>  Budget Minutes</b></label>
				     <input id="BUDGET_MIN" type="text" name="BUDGET_MIN" class="form-control" required>
			  </div>
			  <div class="form-group">
             <label><b><i class="nc-icon  nc-watch-time"></i>  Actual Minutes</b></label>
             <input id="ACTUAL_MIN" type="text" name="ACTUAL_MIN" class="form-control" required>
        </div>
			</div>
			<div class="modal-footer">
			  <input type="hidden" name="employee_id" id="employee_id"/>
			  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
			  <input type="submit" id="updatedata" name="updatedata" class="btn btn-primary btn_update" value="">
			</div>
		</form>
	 </div>
   </div>
  </div>

  <!-- View Modal HTML -->
  <div id="viewProjectModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post">
				<div class="modal-header">
					<h4 class="modal-title">View Project Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">

              <div class="form-group">
			   <input type="hidden" name="employees_id" id="employees_id"/>
               <label><b><i class="nc-icon nc-badge"></i>   Team Member</b></label>
			   <input disabled id="TEAM_MEMBERS" type="text" name="TEAM_MEMBER" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Project Name</b></label>
				 <input disabled id="PROJECTS" type="text" name="PROJECT" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Company Name</b></label>
				 <input disabled id="COMPANYS" type="text" name="COMPANY" class="form-control" required>
			  </div>


			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Date</b></label>
				 <input disabled id="DA_TES" type="text" name="DA_TE" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Weeks</b></label>
				 <input disabled id="WEEKS" type="text" name="WEEK" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Month</b></label>
				 <input disabled id="MONTH" type="text" name="MONTH" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Budget Minutes</b></label>
				 <input disabled id="BUDGET_MINS" type="text" name="BUDGET_MIN" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Budget Hours</b></label>
				 <input disabled id="BUDGET_HRS" type="text" name="BUDGET_HR" class="form-control" required>
			  </div>

			  <div class="form-group">
                 <label><b><i class="nc-icon  nc-watch-time"></i>  Actual Minutes</b></label>
                 <input disabled id="ACTUAL_MINS" type="text" name="ACTUAL_MIN" class="form-control" required>
              </div>

			  <div class="form-group">
                 <label><b><i class="nc-icon  nc-watch-time"></i>  Actual Hours</b></label>
                 <input disabled id="ACTUAL_HRS" type="text" name="ACTUAL_HR" class="form-control" required>
              </div>

			  <div class="form-group">
                 <label><b><i class="nc-icon  nc-watch-time"></i>  Variance Minutes</b></label>
                 <input disabled id="VARIANCE_MINS" type="text" name="VARIANCE_MIN" class="form-control" required>
              </div>

			</div>
			<div class="modal-footer">
			  <input type="hidden" name="employee_id" id="employee_id"/>
			  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
			</div>
		</form>
	 </div>
   </div>
  </div>

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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
  $(document).ready(function(){
	  $(document).on('click','.edit_btn', function(){
		  var employee_id = $(this).attr("id");
		  $.ajax({
			  url:"fetch.php",
			  method:"POST",
			  data:{employee_id:employee_id},
			  dataType:"json",
			  success:function(data){
				  $('#TEAM_MEMBER').val(data.TEAM_MEMBER);
				  $('#PROJECT').val(data.PROJECT);
				  $('#COMPANY').val(data.COMPANY);
				  $('#DA_TE').val(data.DA_TE);
				  $('#BUDGET_MIN').val(data.BUDGET_MIN);
				  $('#ACTUAL_MIN').val(data.ACTUAL_MIN);
				  $('#employee_id').val(data.id);
          $('#updatedata').val('Update');
				  $('#editProjectModal').modal('show');
          $('#Alert1').modal('show');
			  }
		  });
	  });
  });
  </script>

  <script>
  $(document).ready(function(){
	  $(document).on('click','.view_btn', function(){
		  var employee_id = $(this).attr("id");
		  $.ajax({
			  url:"fetch.php",
			  method:"POST",
			  data:{employee_id:employee_id},
			  dataType:"json",
			  success:function(data){
				  $('#TEAM_MEMBERS').val(data.TEAM_MEMBER);
				  $('#PROJECTS').val(data.PROJECT);
				  $('#COMPANYS').val(data.COMPANY);
				  $('#DA_TES').val(data.DA_TE);
				  $('#WEEKS').val(data.WEEK);
				  $('#MONTH').val(data.MONTH);
				  $('#BUDGET_MINS').val(data.BUDGET_MIN);
				  $('#ACTUAL_MINS').val(data.ACTUAL_MIN);
				  $('#BUDGET_HRS').val(data.BUDGET_HR);
				  $('#ACTUAL_HRS').val(data.ACTUAL_HR);
				  $('#VARIANCE_MINS').val(data.VARIANCE_MIN);
				  $('#employee_id').val(data.id);
				  $('#viewProjectModal').modal('show');
			  }
		  });
	  });
  });
  </script>

</body>

</html>
