<?php
    session_start();
    include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Appliction</title>

    <!-- Booststrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>

    <div class="conatiner">
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




        <div class="card col-md-6 mx-auto mt-4">
            <div class="card-header">
                <p class="h3 text-secondary text-center">User login form</p>
            </div>
            <div class="card-body">
                <form action="./loginValidation.php" method="POST">
                    <label for="">Name</label>
                    <input type="text" class="form-control my-2" name="name">
                    <?php
                        if(isset($_SESSION['name_err'])){?>
                            <p class="text-danger"><?= $_SESSION['name_err'] ?></p>
                        <?php }
                    ?>

                    
                    <label for="">Email</label>
                    <input type="email" class="form-control my-2" name="email">
                      <?php
                        if(isset($_SESSION['email_err'])){?>
                            <p class="text-danger"><?= $_SESSION['email_err'] ?></p>
                        <?php }
                    ?>

                    <label for="">Password</label>
                    <input type="password" class="form-control my-2" name="password">
                    <?php
                        if(isset($_SESSION['password_err'])){?>
                            <p class="text-danger"><?= $_SESSION['password_err'] ?></p>
                        <?php }
                    ?>
                    <button type="submit" class="btn btn-success w-100" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        session_unset();
    ?>






    <!-- Boostrap JS CDN -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>