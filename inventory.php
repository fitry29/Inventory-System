<?php include 'session_check.php'; ?>
<?php
    $status = "";
    $status2 = "active";
    $status3 = "";
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
            <?php
                if(isset($_GET['update']) && $_GET['update'] == 'success'){
                    
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Inventory updated successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
                if(isset($_GET['update']) && $_GET['update'] == 'deleted'){
                    
                    echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Inventory deleted successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            ?>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Inventory</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">This is inventory page where you can update and create items.</li>
                </ol>
                <div class="row">
                    <div class="mb-2 col text-end"><a class="btn btn-primary" href="/inventory-system/create-inventory.php" >Create Item</a></div>
                    <div class="card mb-4">
                            <div class="card-header ">
                                <i class="fas fa-table"></i>
                                All Inventory
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Seriel Number</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Seriel Number</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php   
                                            foreach ($result as $r):
                                        ?>
                                        <tr>
                                            <td><?php echo $r['sn_no']?></td>
                                            <td><?php echo $r['item_name']?></td>
                                            <td><?php echo $r['item_desc']?></td>
                                            <td>
                                                <a href="/inventory-system/<?php echo $r['img']?>" target="_blank"> <u>Click here to see item image</u> </a>
                                                <!-- <img src="" class="img-fluid" style="width:150px" alt=""> -->
                                            </td>
                                            <td><?php echo $r['qty']?></td>
                                            <td><?php echo $r['category_name']?></td>
                                            <td><?php echo $r['created_at']?></td>
                                            <td>
                                                <a href="/inventory-system/edit-inventory.php?id=<?php echo $r['id']?>" class="btn btn-warning">Edit</a>
                                                <a href="/inventory-system/delete-inventory.php?id=<?php echo $r['id']?>" class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                        <?php  endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php
    include('layout/footer.php');
?>