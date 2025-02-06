<?php
    include('db_connection.php');

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $category_name = mysqli_real_escape_string($conn, $_POST['name']);

        //Insert data into inventory table
        $sql = "INSERT INTO categories (name)
                VALUES ('$category_name')";

        if(mysqli_query($conn, $sql)){
            //REDIRECT to inventory page on success
            header("Location: /inventory-system/category.php?create=success");
            exit;
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>