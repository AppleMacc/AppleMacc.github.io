<?php

    include("config.php");

    if(!isset($_SESSION))
    {
        session_start();
    }

    $Date_Logged = mysqli_real_escape_string($con,$_POST['Date_Logged']);

    $Action_Item = mysqli_real_escape_string($con,$_POST['Action_Item']);

    $Team_Member2 = mysqli_real_escape_string($con,$_POST['Team_Member2']);

    $Team_Member3 = mysqli_real_escape_string($con,$_POST['Team_Member3']);

    $Responsible_person = mysqli_real_escape_string($con,$_POST['Responsible_person']);

    $date = new DateTime($Date_Logged);
    $Week = $date->format("W");

    $Status=mysqli_real_escape_string($con,$_POST['Status']);

    $Date_to_be_Complete =mysqli_real_escape_string($con,$_POST['Date_to_be_Complete']);
    $date1 = new DateTime($Date_to_be_Complete);


    $Challenges =mysqli_real_escape_string($con,$_POST['Challenges']);

    $Date_Completed =mysqli_real_escape_string($con,$_POST['Date_Completed']);
    $date2 = new DateTime($Date_Completed);


    $Variance = $date1->diff($date2)->format('%a');

    $Column_1 = " ";


    $sql = "UPDATE actions SET Week='$Week',Date_Logged='$Date_Logged',Action_Item='$Action_Item',Responsible_person='$Responsible_person',Team_Member2='$Team_Member2',Team_Member3='$Team_Member3',
          	Status='$Status',Date_to_be_Complete='$Date_to_be_Complete',Challenges='$Challenges',
            Date_Completed='$Date_Completed', Variance='$Variance', Column_1='$Column_1' WHERE ID ='". $_SESSION['employee_ids'] ."'";

    if (mysqli_query($con, $sql))
    {
        header("Location:tableAction.php");
        $_SESSION['response']="Record has been updated succesfully!";
        $_SESSION['res_type']="success";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);

?>
