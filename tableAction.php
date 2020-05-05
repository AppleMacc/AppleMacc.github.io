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

	 $result = mysqli_query($con,"SELECT * FROM actions");


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
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Planning Timesheet</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
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
          <h1 class="h3 mb-2 text-gray-800">Action Items Timesheet</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Blue Pearl Timesheet</h6>
			  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addActionModal"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Action Item</a>
			</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
  					<tr>
  					  <th>ID</th>
  					  <th width='15%'>Week</th>
  					  <th>Date Logged</th>
  					  <th width='15%'>Action Item</th>
  					  <th width='15%'>Responsible Person</th>
  					  <th width='15%'>Status</th>
  					  <th width='15%'>Date To Be Completed</th>
              <th width='15%'>Date Completed</th>
  					  <th>Action</th>
  					</tr>
				  </thead>
          <tfoot>
  					<tr>
              <th>ID</th>
  					  <th width='15%'>Week</th>
  					  <th>Date Logged</th>
  					  <th width='15%'>Action Item</th>
  					  <th width='15%'>Responsible Person</th>
  					  <th width='15%'>Status</th>
  					  <th width='15%'>Date To Be Completed</th>
              <th width='15%'>Date Completed</th>
  					  <th>Action</th>
  					</tr>
				  </tfoot>
          <tbody>
				  <?php
            while($fetch = mysqli_fetch_array($result)){
              ?>
              <tr>
	              <td> <?php echo $fetch['ID']; ?></td>
                <td> <?php echo $fetch['Week']; ?></td>
                <td> <?php echo $fetch['Date_Logged']; ?></td>
                <td> <?php echo $fetch['Action_Item']; ?></td>
                <td> <?php echo $fetch['Responsible_person']; ?></td>
    						<td> <?php echo $fetch['Status']; ?></td>
    						<td> <?php echo $fetch['Date_to_be_Complete']; ?></td>
                <td> <?php echo $fetch['Date_Completed']; ?></td>
                <td width='10%'>
    							<a type="submit" id="<?php echo $fetch['ID']; ?>" class="view_btns text-primary" Title="view" data-toggle="tooltip"><i class="text-primary far fa-eye"></i></a>
    							<a type="submit" id="<?php echo $fetch['ID']; ?>" class="edit_btns text-primary" Title="edit" data-toggle="tooltip"><i class="text-primary fas fa-pencil-alt"></i></a>
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
  <div id="addActionModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="addActionHours.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Add Action Item</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">
              <div class="form-group">
               <label><b><i class="nc-icon nc-circle-10"></i> Responsible Person</b></label>
               <select name="Responsible_person" class="browser-default custom-select">
                <option selected>Please select</option>
                <option value="Abram"> Abram </option>
                <option value="Chaka"> Chaka </option>
                <option value="Kamo"> Kamo </option>
                <option value="Donald"> Donald </option>
                <option value="Kamo"> Kamo </option>
                <option value="Malcolm"> Malcolm </option>
                <option value="Saireshan"> Saireshan </option>
               </select>
			  </div>
			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Date Logged</b></label>
				 <input type="date" name="Date_Logged" class="form-control datepicker" required>
			  </div>

        <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Action Item</b></label>
				 <input type="text" name="Action_Item" class="form-control" required>
			  </div>

        <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Status</b></label>
				 <input type="text" name="Status" class="form-control" required>
			  </div>

        <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>  First Additional Member</b></label>
				 <input type="text" name="Team_Member2" class="form-control">
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-calendar-60"></i> Second Additional Member</b></label>
				 <input type="text" name="Team_Member3" class="form-control">
			  </div>
			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Date To Be Completed</b></label>
				 <input type="date" name="Date_to_be_Completed" class="form-control datepicker" required>
			  </div>
			  <div class="form-group">
          <label><b><i class="nc-icon  nc-watch-time"></i>  Challenges</b></label>
          <input type="text" name="Challenges" class="form-control">
        </div>
        <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Date Completed</b></label>
				 <input type="date" name="Date_Completed" class="form-control datepicker" required>
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
  <div id="editActionModal" class="modal fade">
    <div class="modal-dialog">
  		<div class="modal-content">
  			<form action="updateAction.php" method="post">
  				<div class="modal-header">
  					<h4 class="modal-title">Edit Action Item</h4>
  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				</div>
  			<div class="modal-body">
                <div class="form-group">
                 <label><b><i class="nc-icon nc-circle-10"></i> Responsible Person</b></label>
                 <select id="Responsible_person" name="Responsible_person" class="browser-default custom-select">
                  <option selected>Please select</option>
                  <option value="Abram"> Abram </option>
                  <option value="Chaka"> Chaka </option>
                  <option value="Kamo"> Kamo </option>
                  <option value="Donald"> Donald </option>
                  <option value="Kamo"> Kamo </option>
                  <option value="Malcolm"> Malcolm </option>
                  <option value="Saireshan"> Saireshan </option>
                 </select>
  			  </div>
  			  <div class="form-group">
  				<label><b><i class="nc-icon nc-badge"></i>   Date Logged</b></label>
  				 <input type="date" id="Date_Logged" name="Date_Logged" class="form-control datepicker" required>
  			  </div>

          <div class="form-group">
  				<label><b><i class="nc-icon nc-badge"></i>   Action Item</b></label>
  				 <input type="text" id="Action_Item" name="Action_Item" class="form-control" required>
  			  </div>

          <div class="form-group">
  				<label><b><i class="nc-icon nc-badge"></i>  First Additional Member</b></label>
  				 <input type="text" id="Team_Member2" name="Team_Member2" class="form-control">
  			  </div>

          <div class="form-group">
  				<label><b><i class="nc-icon nc-badge"></i>  Second Additional Member</b></label>
  				 <input type="text" id="Team_Member3" name="Team_Member3" class="form-control">
  			  </div>

          <div class="form-group">
  				<label><b><i class="nc-icon nc-badge"></i>   Status</b></label>
  				 <input type="text" id="Status" name="Status" class="form-control" required>
  			  </div>

  			  <div class="form-group">
  				 <label><b><i class="nc-icon nc-time-alarm"></i>  Date To Be Completed</b></label>
  				 <input type="date" id="Date_to_be_Complete" name="Date_to_be_Complete" class="form-control datepicker" required>
  			  </div>
  			  <div class="form-group">
            <label><b><i class="nc-icon  nc-watch-time"></i>  Challenges</b></label>
            <input type="text" id="Challenges" name="Challenges" class="form-control" required>
          </div>
          <div class="form-group">
  				 <label><b><i class="nc-icon nc-time-alarm"></i>  Date Completed</b></label>
  				 <input type="date" id="Date_Completed" name="Date_Completed" class="form-control datepicker" required>
  			  </div>
  			</div>
        <div class="modal-footer">
          <input type="hidden" name="employee_ids" id="employee_ids"/>
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" id="updatedatas" name="updatedatas" class="btn btn-primary btn_updates" value="">
        </div>
  		</form>
  	 </div>
     </div>
  </div>



  <!-- View Modal HTML -->
  <div id="viewActionModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post">
				<div class="modal-header">
					<h4 class="modal-title">View Action Item Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">

        <div class="form-group">
			   <input type="hidden" name="employees_ids" id="employees_ids"/>
         <label><b><i class="nc-icon nc-badge"></i>   Responsible Person</b></label>
			   <input disabled id="Responsible_persons" type="text" name="Responsible_person" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Week</b></label>
				 <input disabled id="Weeks" type="text" name="Week" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Action Item</b></label>
				 <input disabled id="Action_Items" type="text" name="Action_Item" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Date Logged</b></label>
				 <input disabled id="Date_Loggeds" type="text" name="Date_Logged" class="form-control" required>
			  </div>

			  <div class="form-group">
				<label><b><i class="nc-icon nc-badge"></i>   Team Member 2</b></label>
				 <input disabled id="Team_Member2s" type="text" name="Team_Member2" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Team Member 3</b></label>
				 <input disabled id="Team_Member3s" type="text" name="Team_Member3" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Status</b></label>
				 <input disabled id="Statuss" type="text" name="Status" class="form-control" required>
			  </div>

			  <div class="form-group">
				 <label><b><i class="nc-icon nc-time-alarm"></i>  Date To Be Completed</b></label>
				 <input disabled id="Date_to_be_Completes" type="text" name="Date_to_be_Complete" class="form-control" required>
			  </div>

        <div class="form-group">
           <label><b><i class="nc-icon  nc-watch-time"></i>  Challenges</b></label>
           <input disabled id="Challengess" type="text" name="Challenges" class="form-control" required>
        </div>

        <div class="form-group">
           <label><b><i class="nc-icon  nc-watch-time"></i>  Date Completed</b></label>
           <input disabled id="Date_Completeds" type="text" name="Date_Completed" class="form-control" required>
        </div>

        <div class="form-group">
           <label><b><i class="nc-icon  nc-watch-time"></i>  Variance</b></label>
           <input disabled id="Variances" type="text" name="Variance" class="form-control" required>
        </div>

        <div class="form-group">
           <label><b><i class="nc-icon  nc-watch-time"></i>  Column 1</b></label>
           <input disabled id="Column_1s" type="text" name="Column_1" class="form-control" required>
        </div>
			 </div>
			<div class="modal-footer">
			  <input type="hidden" name="employee_ids" id="employee_ids"/>
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
	  $(document).on('click','.edit_btns', function(){
		  var employee_ids = $(this).attr("id");
		  $.ajax({
			  url:"fetchAction.php",
			  method:"POST",
			  data:{employee_ids:employee_ids},
			  dataType:"json",
			  success:function(data){
				  $('#Responsible_person').val(data.Responsible_person);
				  $('#Date_Logged').val(data.Date_Logged);
				  $('#Action_Item').val(data.Action_Item);
				  $('#Team_Member2').val(data.Team_Member2);
				  $('#Team_Member3').val(data.Team_Member3);
				  $('#Status').val(data.Status);
          $('#Challenges').val(data.Challenges);
          $('#Date_to_be_Complete').val(data.Date_to_be_Complete);
          $('#Date_Completed').val(data.Date_Completed);
				  $('#employee_ids').val(data.id);
          $('#updatedatas').val('Update');
				  $('#editActionModal').modal('show');

			  }
		  });
	  });
  });
  </script>

  <script>
  $(document).ready(function(){
	  $(document).on('click','.view_btns', function(){
		  var employee_ids = $(this).attr("id");
		  $.ajax({
			  url:"fetchAction.php",
			  method:"POST",
			  data:{employee_ids:employee_ids},
			  dataType:"json",
			  success:function(data){
          $('#Responsible_persons').val(data.Responsible_person);
				  $('#Date_Loggeds').val(data.Date_Logged);
				  $('#Action_Items').val(data.Action_Item);
				  $('#Team_Member2s').val(data.Team_Member2);
				  $('#Team_Member3s').val(data.Team_Member3);
				  $('#Statuss').val(data.Status);
          $('#Challengess').val(data.Challenges);
          $('#Date_to_be_Completes').val(data.Date_to_be_Complete);
          $('#Date_Completeds').val(data.Date_Completed);
          $('#Variances').val(data.Variance);
          $('#Weeks').val(data.Week);
          $('#Column_1s').val(data.Column_1);
				  $('#employee_ids').val(data.id);
				  $('#viewActionModal').modal('show');
			  }
		  });
	  });
  });
  </script>

</body>

</html>
