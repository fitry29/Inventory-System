<?php
    include 'session_check.php';
    include('db_connection.php');

    session_start();
    // handle formn submision
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //GEt the new password from form
        $new_password = trim($_POST['new_password']);


        //check if the new pass is empty
        if(empty($new_password)){
            $error = "Password cannot be empty";
        }else{
            //update the password to db
            $user_id = $_SESSION['user_id'];
            $sql = "UPDATE users SET password = '$new_password' WHERE id = '$user_id'";

            //execute query
            if(mysqli_query($conn, $sql)){
                $success = "Password updated successfully";
            }else{
                $error = "Error updating password: " . mysqli_error($conn) ;
            }
        }
    }
?>
<?php
    $status = "";
    $status2 = "";
    $status3 = "active";
    $status3 = "";
    include('layout/header.php');
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card my-5">
                    <h3 class="px-4 pt-4">Reset Password</h3>

                    <?php
                    //display error or success
                    
                    if(!empty($error)){
                        
                        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">' . $error . 
                                    
                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                    if(!empty($success)){
                        
                        echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">'
                                    . $error . 
                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                    ?>

                    <form class="p-4"  method="POST" action=""> 
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
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