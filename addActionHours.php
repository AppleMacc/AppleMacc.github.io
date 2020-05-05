<?php
    session_start();
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $Date_Logged= mysqli_real_escape_string($con,$_POST['Date_Logged']);

        $Action_Item = mysqli_real_escape_string($con,$_POST['Action_Item']);

        $Team_Member2 = mysqli_real_escape_string($con,$_POST['Team_Member2']);

        $Team_Member3 = mysqli_real_escape_string($con,$_POST['Team_Member3']);

        $Responsible_person = mysqli_real_escape_string($con,$_POST['Responsible_person']);

        $date = new DateTime($Date_Logged);
        $Week = $date->format("W");
        $Status=mysqli_real_escape_string($con,$_POST['Status']);

        $Date_To_Be_Complete =mysqli_real_escape_string($con,$_POST['Date_To_Be_Complete']);
        $date1 = new DateTime($Date_Completed);


        $Challenges =mysqli_real_escape_string($con,$_POST['Challenges']);

        $Date_Completed =mysqli_real_escape_string($con,$_POST['Date_Completed']);
        $date2 = new DateTime($Date_Completed);


        $Variance = $date1->diff($date2)->format('%a');

        $Column_1 = $date1->diff($date2)->format('%a');


        if (!$con)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        //Insert data into the database table
        $sql = "INSERT INTO actions (ID,Week,Date_Logged, Action_Item, Responsible_person, Team_Member2, Team_Member3, Team_Member4, Team_Member5, Status, Date_To_Be_Complete, Challenges, Date_Completed, Variance, Column_1)
        VALUES (DEFAULT ,'".$Week."', '".$Date_Logged."', '".$Action_Item."','".$Responsible_person."', '".$Team_Member2."','".$Team_Member3."','','','".$Status."','".$Date_To_Be_Complete."','".$Challenges."',
               '".$Date_Completed."' ,'".$Variance."','".$Column_1."')";

        if (mysqli_query($con, $sql))
        {
            header("Location:tableAction.php");
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
