<?php
    include('db_connection.php');

    $id = $_GET['id'];

    if(isset($id)){
        $sql = "DELETE FROM inventory WHERE  category_id = $id";

        if(mysqli_query($conn, $sql)){
            $query = "DELETE FROM categories WHERE id = '$id' ";

            if(mysqli_query($conn, $query)){
                //REDIRECT to inventory page on success
                header("Location: /inventory-system/category.php?update=deleted");
                exit();
            }else{
                echo "Error: " . mysqli_error($conn);
            }   
           
        }else{
            echo "Error: " . mysqli_error($conn);
        }  

    }else{
        echo "Error: " . mysqli_error($conn);
    } 


?>