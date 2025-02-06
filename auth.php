<?php
    include('db_connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Get the email and password from the form
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        // Fetch user data from db
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        //Check if user with the provided emal exist
        if(mysqli_num_rows($result) === 1){
            $user = mysqli_fetch_assoc($result);

            //Verify password
            if($password == $user['password']){
                session_start();
                // Set session variables for logged in user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                //redirect to dashboard or main page
                header("Location: dashboard.php");
                exit();
            }
            else{
                header('Location: index.php?login=fail');
            }
        }else{
            header('Location: index.php?login=fail');
        }
    }
    mysqli_close($conn);
?>