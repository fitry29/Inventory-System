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
    $query = " SELECT * FROM stock_movement";
    $result = mysqli_query($conn, $query);
?>
    <div id="layoutSidenav_content">
        <main>
            <?php
                if(isset($_GET['update']) && $_GET['update'] == 'success'){
                    
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Inventory and Stock Movement updated successfully!.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            ?>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Stock Movement Log</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">This is where stock in and out is monitored.</li>
                </ol>
                <div class="row">
                    <div class="mb-2 col text-end">
                        <a class="btn btn-primary" href="/inventory-system/stock-in.php" >Stock In</a>
                        <a class="btn btn-danger" href="/inventory-system/stock-out.php" >Stock Out</a>
                    </div>
                    <div class="card mb-4">
                            <div class="card-header ">
                                <i class="fas fa-table me-1"></i>
                                All Inventory
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Seriel Number</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Type</th>
                                            <th>Seriel Number</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php  foreach ($result as $r):?>
                                        <tr>
                                            <td><?php echo $r['type']?></td>
                                            <td><?php echo $r['sn_no']?></td>
                                            <td><?php echo $r['item_name']?></td>
                                            <td><?php echo $r['item_desc']?></td>
                                            <td><?php echo $r['qty']?></td>
                                            <td><?php echo $r['created_at']?></td>
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