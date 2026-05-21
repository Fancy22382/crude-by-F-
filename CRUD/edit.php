<?php
    session_start();
    include('navbar.php');
    include('env.php');
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT name, email, password FROM login_data WHERE id =?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
//    print_r($user)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
        <!-- Booststrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
          
        <div class="card col-md-6 mx-auto mt-4">
            <div class="card-header">
                <p class="h4 text-secondary">Edit User</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="./editDataValidation.php" method="POST">
                        <input type="text" name="id" value="<?= $id ?>" hidden>
                        <lable>Name</lable>
                        <input type="text" class="form-control" value="<?= $user['name'] ?>" name="name">
                          <?php
                        if(isset($_SESSION['name_err'])){?>
                            <p class="text-danger"><?= $_SESSION['name_err'] ?></p>
                        <?php }
                    ?>

                        <lable>Email</lable>
                        <input type="text" class="form-control my-2" value="<?= $user['email'] ?>" name="email">
                          <?php
                        if(isset($_SESSION['email_err'])){?>
                            <p class="text-danger"><?= $_SESSION['email_err'] ?></p>
                        <?php }
                    ?>

                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="./allUser.php"type="button" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_unset();
?>