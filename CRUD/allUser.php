<?php
    session_start();
    include('env.php');
    include('navbar.php');
    $querry = "SELECT * FROM login_data WHERE 1";
    $fetchData = mysqli_query($conn, $querry);
    $views = mysqli_fetch_all($fetchData,1);
    // echo "<pre>";
    // print_r($views);
    // echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>
     <!-- Booststrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">

                 <?php
            if(isset($_SESSION['delete_success'])){?>
            <div class="toast show mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto text-danger">Deleted!</strong>
    <small>11 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-danger">
    <?= $_SESSION['delete_success'] ?>
  </div>
</div>

            <?php }
        
        
        ?>

         <?php
            if(isset($_SESSION['success'])){?>
            <div class="toast show mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto text-success">Successful!</strong>
    <small>11 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-success">
    <?= $_SESSION['success'] ?>
  </div>
</div>

            <?php }
        
        
        ?>
        <div class="card col-md-10 mx-auto mt-4">
            <div class="card-header d-flex justify-content-between">
                <span class="fs-4 text-secondary text-center ">All user</span>
                <a href="./index.php" class="btn btn-danger btn-sm ">Back</a>
            </div>
            <div class="card-body">
                <table class="table">
                <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
               <?php
                    foreach($views as $key=>$view){?>
              <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $view['name'] ?> </td>
                    <td><?= $view['email'] ?></td>
                    <td>
                        <div class="btn  btn-group">
                            <a href="./viewUser.php?id=<?= $view['id'] ?> " class="btn btn-primary btn-sm">View</a>
                            <a href="./edit.php?id=<?= $view['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="./deleteUser.php?id=<?= $view['id']?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
 
                <?php }
               ?>
            </table>
            </div>
        </div>
    </div>




<!-- Boostrap JS CDN -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
<?php
    session_unset();

?>