<?php
    session_start();
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Member Name, Company Name, Project Name, Date, Budget Minutes and Actual Minutes sent from form
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



        if (!$con)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        //Insert data into the database table
        $sql = "INSERT INTO employees (ID,TEAM_MEMBER, COMPANY, PROJECT, DA_TE, WEEK, MONTH, BUDGET_MIN, BUDGET_HR, ACTUAL_MIN, ACTUAL_HR, VARIANCE_MIN)
        VALUES (DEFAULT ,'".$TEAM_MEMBER."', '".$COMPANY."', '".$PROJECT."', '".$DA_TE."','".$WEEK."','".$MONTH."','".$BUDGET_MIN."','".$BUDGET_HR."','".$ACTUAL_MIN."','".$ACTUAL_HR."','".$VARIANCE_MIN."')";

        if (mysqli_query($con, $sql))
        {
            header("Location:tables.php");
            $_SESSION['response']="Record has been inserted succesfully!";
            $_SESSION['res_type']="success";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    }
?>
