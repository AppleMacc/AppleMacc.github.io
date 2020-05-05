<?php
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        if ($stmt = $con->prepare('SELECT id, username, password FROM users WHERE email = ? '))
        {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->bind_result($id, $username, $password);
                $stmt->fetch();
                // Account exists, now we verify the password.
                $String = $_POST['password'];


                //if (password_verify($_POST['password'], $password))
                if ($_POST['password']===$password)
                {
                    // Verification success! User has loggedin!
	                  // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
	                 session_regenerate_id();
	                  $_SESSION['loggedin'] = TRUE;
	                  $_SESSION['username'] = $username;
					          $_SESSION['id'] = $id;

					          header("Location:admin.php");
	                  echo 'Welcome ' . $_SESSION['username'] . '!';

                }
                else
                {
                    echo 'fail';
                }
            }
            else
            {
                echo 'fail';
            }
            $stmt->close();
        }
    }
?>
