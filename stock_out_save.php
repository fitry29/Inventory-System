<?php
    include('db_connection.php');

    If($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = intval($_POST['id']);
        $new_qty = intval($_POST['qty']);
        $type = "Stock Out";


        //Select query to inventory details
        $query = " SELECT 
        inventory.id,
        inventory.sn_no,
        inventory.item_name,
        inventory.item_desc,
        inventory.qty
        FROM inventory
        WHERE inventory.id = $id;
        ";

        $result = mysqli_query($conn, $query);

        //check if a record was found
        if($items = mysqli_fetch_assoc($result)){
            //extract data from fetch record
            $sn_no = $items['sn_no'];
            $item_name = $items['item_name'];
            $item_desc = $items['item_desc'];
            $current_qty = $items['qty'];

            if($current_qty < $new_qty){
                header("Location: /inventory-system/stock-out.php?alert=insufficient");
                exit();
            }

            //Insert query for stock movement table
            $sql = " 
            INSERT INTO stock_movement (type, sn_no, item_name, item_desc, qty)
            VALUES ('$type', '$sn_no', '$item_name', '$item_desc', '$new_qty');";

            if(mysqli_query($conn, $sql)){
                //update the qty in inventory table
                $update_qty = $current_qty - $new_qty;
                $update_query = " UPDATE
                        inventory
                        SET qty = $update_qty
                        WHERE id = $id;
                ";

                if(mysqli_query($conn, $update_query)){
                    //echo "Record add successfully to stock_movement table and inventory quantity updated successfully";
                    header("Location: /inventory-system/stock-movement.php?update=success");
                    exit;
                }else{
                    echo "Error inserting into inventory: ". mysqli_error($conn);
                } 
            } else{
                echo "Error inserting into stock_movement: ". mysqli_error($conn);
            }
        } else{
            echo "No item found with the provide ID.";
        }

        mysqli_close($conn);
    }
?>