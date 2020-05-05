<?php

    include("config.php");

    if(!isset($_SESSION))
    {
        session_start();
    }

    $TEAM_MEMBER= mysqli_real_escape_string($con,$_POST['TEAM_MEMBER']);
    $COMPANY = mysqli_real_escape_string($con,$_POST['COMPANY']);
    $PROJECT = mysqli_real_escape_string($con,$_POST['PROJECT']);
    $DA_TE = mysqli_real_escape_string($con,$_POST['DA_TE']);
    $date = new DateTime($DA_TE);
    $WEEK = $date->format("W");
    $MONTH = $date->format('M/Y');
    $DAY = $date->format('D,w');
    $BUDGET_MIN=mysqli_real_escape_string($con,$_POST['BUDGET_MIN']);
    $BUDGET_HR=$BUDGET_MIN/60;
    $ACTUAL_MIN=mysqli_real_escape_string($con,$_POST['ACTUAL_MIN']);
    $ACTUAL_HR=$ACTUAL_MIN/60;
    $VARIANCE_MIN = $BUDGET_MIN - $ACTUAL_MIN;


    $sql = "UPDATE employees SET TEAM_MEMBER='$TEAM_MEMBER',COMPANY='$COMPANY',PROJECT='$PROJECT',DA_TE='$DA_TE',
          	WEEK='$WEEK',MONTH='$MONTH',BUDGET_MIN='$BUDGET_MIN',BUDGET_HR='$BUDGET_HR',ACTUAL_MIN='$ACTUAL_MIN',ACTUAL_HR='$ACTUAL_HR',
            VARIANCE_MIN='$VARIANCE_MIN' WHERE ID ='". $_SESSION['employee_id'] ."'";

    if (mysqli_query($con, $sql))
    {
        header("Location:tables.php");
        $_SESSION['response']="Record has been updated succesfully!";
        $_SESSION['res_type']="success";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);

?>
