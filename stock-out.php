<?php include 'session_check.php'; ?>
<?php
    $status = "";
    $status2 = "";
    $status3 = "active";
    $status4 = "";
    include('layout/header.php');
?>
<?php 
    include('db_connection.php');
    $query = " SELECT 
    inventory.id,
    inventory.sn_no,
    inventory.item_name,
    inventory.item_desc,
    inventory.img,
    inventory.qty,
    inventory.created_at,
    inventory.category_id,
    categories.name AS category_name
    FROM
        inventory
    JOIN
        categories ON inventory.category_id = categories.id;

    ";
    $result = mysqli_query($conn, $query);
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php 
                    if(isset($_GET['alert']) && $_GET['alert'] == 'insufficient'){
                        echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Insufficient stock quantity to stock out!.
                        
                        </div>';
                    }
                ?>
                <div class="card my-5">
                    <h3 class="px-4 pt-4">Stock Movement Out</h3>
                    <form class="p-4"  method="post" action="stock_out_save.php" > 
                        <div class="mb-3">
                            <label for="id" class="form-label">Item Name</label>
                            <select class="form-select" id="id" name="id">
                                <?php  
                                    foreach ($result as $r): 
                                ?>
                                <option value='<?php echo $r['id'];?>'><?php echo $r['item_name'];?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="item-qty" name="qty">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

             
            
            </div>
        </main>
    </div>

<?php
    include('layout/footer.php');
?>