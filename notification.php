<?php
include "config.php";

if(isset($_POST["view"])){

$result = mysqli_query($con,"SELECT * FROM employees ORDER BY ID DESC LIMIT 5");
$output = '';
if(mysqli_num_rows($result>0)){
  while($row=mysqli_fetch_array($result)){
    $output .= '<li class="nav-item dropdown no-arrow mx-1">
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
                        <div class="small text-gray-500">'.date("mmm/dd/yyyy").' '. date("h:i:sa").'</div>
                        <span class="font-weight-bold">'.row["PROJECT"].'</span>
                    </div>
                    </a>
                  </div>
                </li>';
              }


} else{
  $output .= '<li class="nav-item dropdown no-arrow mx-1">
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
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">No Notification Found</span>
                  </div>
                  </a>
                </div>
              </li>';
   }

   $result_1 = mysqli_query($con,"SELECT * FROM employees WHERE ID = 0");
   $count = mysqli_num_rows($result_1);
   $data = array (
     'notification'         => $output,
     'unseen_notification'  => $count
   );

   echo json_encode($data);

  }


?>
