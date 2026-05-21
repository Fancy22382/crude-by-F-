<?php
    session_start();
    include('env.php');
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM login_data WHERE id = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();
    if($delete){
        $_SESSION['delete_success'] = "Data Deleted Successfully!";
        header('Location:./allUser.php');
        exit();
    }
    

?>