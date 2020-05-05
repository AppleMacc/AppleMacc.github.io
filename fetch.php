<?php
include("config.php");

if(isset($_POST['employee_id'])){

	session_regenerate_id();
	$_SESSION['employee_id'] = $_POST['employee_id'] ;

	$result = mysqli_query($con,"SELECT * FROM employees WHERE id='".$_POST['employee_id']."'");
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

}

?>
