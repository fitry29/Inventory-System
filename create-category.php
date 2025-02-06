<?php include 'session_check.php'; ?>
<?php
    $status = "";
    $status2 = "";
    $status3 = "";
    $status4 = "active";
    include('layout/header.php');
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card my-5">
                    <h3 class="px-4 pt-4">Add Category</h3>
                    <form class="p-4"  method="post" action="submit-category.php" > 
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
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