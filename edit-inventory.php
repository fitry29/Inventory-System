<?php include 'session_check.php'; ?>
<?php
    $status = "";
    $status2 = "active";
    $status3 = "";
    include('layout/header.php');
?>
<?php 
    include('db_connection.php');
    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);

    $inventory_id = $_GET['id'];
    $query2 = " SELECT 
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
        categories ON inventory.category_id = categories.id
    WHERE
        inventory.id = ". $inventory_id.";"
    ;
    $result2 = mysqli_query($conn, $query2);
    $inventory_data = mysqli_fetch_assoc($result2);
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card my-5">
                    <h3 class="px-4 pt-4">Create Item</h3>
                    <form class="p-4"  method="POST" enctype="multipart/form-data" action="submit_edited_inventory.php" >
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($inventory_data['id']) ?>" >

                        <div class="mb-3">
                            <label for="sn-no" class="form-label">Seriel No</label>
                            <input type="text" class="form-control" id="sn-no" name="sn_no" placeholder="Enter SN no for item" value="<?php echo htmlspecialchars($inventory_data['sn_no']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item-name" name="item_name" placeholder="Enter item name" value="<?php echo htmlspecialchars($inventory_data['item_name'])?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-desc" class="form-label">Item Description</label>
                            <textarea class="form-control" id="item-desc" name="item_desc" placeholder="Write some item description..."  ><?php echo htmlspecialchars($inventory_data['item_desc'])?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Current Image Item</label><br>
                            <img src="<?php echo htmlspecialchars($inventory_data['img'])?>" class="rounded img-fluid" style="width: 200px;" alt="...">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image Item</label>
                            <input type="file" id="formFile" name="img"  class="form-control" accept="image/* " value="<?php echo htmlspecialchars($inventory_data['img'])?>" >
                        </div>
                        <div class="mb-3">
                            
                            <label for="item-qty" class="form-label">Item Quantity</label>
                            <input type="number" class="form-control" id="item-qty" name="qty" placeholder="Enter item quantity" value="<?php echo htmlspecialchars($inventory_data['qty'])?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="category-id"  class="form-label">Select Category</label>
                            <select class="form-select" id="category-id" name="category_id" required>
                                <option value="<?php echo htmlspecialchars($inventory_data['category_id'])?>"> <?php echo htmlspecialchars($inventory_data['category_name'])?> </option>
                                <?php   
                                    while($row = mysqli_fetch_assoc($result)){
                                        $selected = ($inventory_data['category_id'] == $row['id']) ? 'selected' :'';
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