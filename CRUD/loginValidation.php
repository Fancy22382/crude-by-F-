<?php
    session_start();

    $btn = $_POST['submit'];
    $name = user_input($_POST['name']);
    $email = user_input($_POST['email']);
    $password = user_input($_POST['password']);
    $encPassword = password_hash($password,PASSWORD_BCRYPT);

    

    if(isset($btn)){
    //Name Validation    
    if(empty($name)){
            $_SESSION['name_err'] = "Name is required";
            header('Location:./index.php');
            exit();
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $_SESSION['name_err'] = "Only letters and white space allowed";
            header('Location:./index.php');
            exit();
        }

        //email validation
    if(empty($email)){
            $_SESSION['email_err'] = "email is required";
            header('Location:./index.php');
            exit();
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email_err'] = "Invalid email format";
            header('Location:./index.php');
            exit();
        }

        //password validaton
     if(empty($password)){
            $_SESSION['password_err'] = "password is required";
            header('Location:./index.php');
            exit();
        }

    //STORE Data
    include('env.php');
     $querry = "INSERT INTO login_data(name, email, password) VALUES (?,?,?)";

     $stmt = $conn->prepare($querry);
     $stmt->bind_param("sss",$name,$email,$encPassword);
   $insert= $stmt->execute();
     if($insert){
        $_SESSION['success'] = "Data Inserted Successfully!";
        header('Location:./index.php');
     }

    
    }

    // data sanitization
    function user_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   

?>