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
    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card my-5">
                    <h3 class="px-4 pt-4">Create Item</h3>
                    <form class="p-4"  method="post" enctype="multipart/form-data" action="submit-inventory.php" >
                        <div class="mb-3">
                            <label for="sn-no" class="form-label">Seriel No</label>
                            <input type="text" class="form-control" id="sn-no" name="sn_no" placeholder="Enter SN no for item" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item-name" name="item_name" placeholder="Enter item name" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-desc" class="form-label">Item Description</label>
                            <textarea class="form-control" id="item-desc" name="item_desc" placeholder="Write some item description..." ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image Item</label>
                            <input type="file" id="formFile" name="img"  class="form-control" accept="image/* ">
                        </div>
                        <div class="mb-3">
                            <label for="item-qty" class="form-label">Item Quantity</label>
                            <input type="number" class="form-control" id="item-qty" name="qty" placeholder="Enter item quantity" required>
                        </div>

                        <div class="mb-3">
                            <label for="category-id"  class="form-label">Select Category</label>
                            <select class="form-select" id="category-id" name="category_id" required>
                                <option selected>Select a category</option>
                                <?php   
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='" . $row['id'] ."'>". htmlspecialchars($row['name']) . "</option>";
                                    }
                                    
                                ?>
                            </select>
                            
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