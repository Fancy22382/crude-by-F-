<?php
    $dbHost = "localhost";
    $dbName = 'CRUD';
    $dbPassword = '';
    $dbUserName = 'root';

    $conn = mysqli_connect($dbHost,$dbUserName,$dbPassword,$dbName);

    if($conn->connect_error){
        die('connection Failed');
    }

?>