<?php
    include('navbar.php');
    // print_r($_GET['id']);
    include('env.php');
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT name, email, password FROM login_data WHERE id =?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    // print_r($user)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ueser</title>
     <!-- Booststrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card col-md-6 mx-auto mt-4">
            <div class="card-header">
                <p class="h4 text-secondary">User Information</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=thumbnail_unscaled&_=20170328184010" class="img-fluid" alt="">
                </div>
                <div class="col-md-10">
                    <p><?= $user['name'] ?></p>
                    <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>