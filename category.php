<?php include 'session_check.php'; ?>
<?php
    $status = "";
    $status2 = "";
    $status3 = "";
    $status4 = "active";
    include('layout/header.php');
?>
<?php
    include('db_connection.php');
    $query = " SELECT * FROM categories";
    $result = mysqli_query($conn, $query);
?>
    <div id="layoutSidenav_content">
        <main>
            <?php
                if(isset($_GET['create']) && $_GET['create'] == 'success'){
                    
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                New category added successfully!.
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
                <h1 class="mt-4">Category List</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">All type of stock categories is here.</li>
                </ol>
                <div class="row">
                    <div class="mb-2 col text-end">
                        <a class="btn btn-primary" href="create-category.php" >Add Category</a>
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
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php  foreach ($result as $r):?>
                                        <tr>
                                            <td><?php echo $r['id']?></td>
                                            <td><?php echo $r['name']?></td>
                                            <td >
                                                <a href="/inventory-system/delete-category.php?id=<?php echo $r['id']?>" class="btn btn-danger">Remove</a>
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