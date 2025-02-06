<?php include 'session_check.php'; ?>
<?php
    $status = "active";
    $status2 = "";
    $status3 = "";
    $status4 = "";
    include('layout/header.php');
?>
<?php 

    include('db_connection.php');

    $sql_total_items = "SELECT COUNT(*) AS total_items FROM inventory";
    $result_total_items = mysqli_query($conn, $sql_total_items);
    $row_total_items = mysqli_fetch_assoc($result_total_items);

    $total_items = $row_total_items['total_items'];


    $sql_total_stocks = "SELECT SUM(qty) AS total_stocks FROM inventory";
    $result_total_stocks = mysqli_query($conn, $sql_total_stocks);
    $row_total_stocks = mysqli_fetch_assoc($result_total_stocks);

    $total_stocks = $row_total_stocks['total_stocks'];

    $sql_total_stocks_in = "SELECT SUM(qty) AS total_stocks_in FROM stock_movement WHERE type = 'Stock In';";
    $result_total_stocks_in = mysqli_query($conn, $sql_total_stocks_in);
    $row_total_stocks_in = mysqli_fetch_assoc($result_total_stocks_in);

    $total_stocks_in = $row_total_stocks_in['total_stocks_in'];

    $sql_total_stocks_out = "SELECT SUM(qty) AS total_stocks_out FROM stock_movement WHERE type = 'Stock Out';";
    $result_total_stocks_out = mysqli_query($conn, $sql_total_stocks_out);
    $row_total_stocks_out = mysqli_fetch_assoc($result_total_stocks_out);

    $total_stocks_out = $row_total_stocks_out['total_stocks_out'];

?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Overall summary of our stock.</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body" style=" height: 90px;">  <h4>Total Item : <?php echo $total_items?></h4> </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body" style=" height: 90px;"> <h4>Total Stock : <?php echo $total_stocks?></h4> </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body" style=" height: 90px;"> <h4>Total Stock In : <?php echo $total_stocks_in?></h4></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body" style=" height: 90px;"><h4>Total Stock Out : <?php echo $total_stocks_out?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php
    include('layout/footer.php');
?>