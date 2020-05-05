<?php
    // start session
    session_start();

    // Change this to your connection info.
    $DATABASE_HOST = 'opps-dashboard-database.c2rer6w0t1v6.eu-west-1.rds.amazonaws.com';
    $DATABASE_USER = 'admin';
    $DATABASE_PASS = 'oppsDashPass123';
    $DATABASE_NAME = 'employee_db';

    // Try and connect using the info above.
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() )
    {
	       // If there is an error with the connection, stop the script and display the error.
         die ('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>
