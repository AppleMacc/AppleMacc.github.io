<?php
include("config.php");

if(isset($_POST['employee_ids'])){

	session_regenerate_id();
	$_SESSION['employee_ids'] = $_POST['employee_ids'] ;

	$result = mysqli_query($con,"SELECT * FROM actions WHERE id='".$_POST['employee_ids']."'");
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

}

?>
