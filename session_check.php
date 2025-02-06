<?php
    session_start();    

    //check if the user is logged in by verifying sessions variables
    if(!isset($_SESSION['user_id'])){

        //if not logged in, redirect to login page
        header("Location: index.php");
        exit();
    }
?>