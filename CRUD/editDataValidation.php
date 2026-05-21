
<?php
    session_start();
    $id = $_POST['id'];
    $btn = $_POST['submit'];
    $name = user_input($_POST['name']);
    $email = user_input($_POST['email']);
    // $password = user_input($_POST['password']);
    // $encPassword = password_hash($password,PASSWORD_BCRYPT);

    

    if(isset($btn)){
    //Name Validation    
    if(empty($name)){
            $_SESSION['name_err'] = "Name is required";
            header('Location:./edit.php?id='.$id);
            exit();
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $_SESSION['name_err'] = "Only letters and white space allowed";
            header('Location:./edit.php?id='.$id);
            exit();
        }

        //email validation
    if(empty($email)){
            $_SESSION['email_err'] = "email is required";
            header('Location:./edit.php?id='.$id);
            exit();
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email_err'] = "Invalid email format";
            header('Location:./edit.php?id='.$id);
            exit();
        }

    //     //password validaton
    //  if(empty($password)){
    //         $_SESSION['password_err'] = "password is required";
    //         header('Location:./edit.php?id='.$id);
    //         exit();
    //     }

    //Update Data
    include('env.php');
    $stmt = $conn->prepare("UPDATE login_data SET name= ?,email= ? WHERE id = ?");
    $stmt->bind_param(
        "ssi",
        $name,
        $email,
        $id
    );
    $insert=$stmt->execute();
    if($insert){
         $_SESSION['success'] = "Data Updated Successfully!";
        header('Location:./allUser.php');
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

