<?php
    include_once('../../config/db.php');
    session_start();

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
    }

    // Get User
    $query = "SELECT * FROM account WHERE email = :email";
    $statement = $pdo ->prepare($query);
    $statement -> execute([
        ":email" => $_POST['email']]);
    $user = $statement -> fetch(0);
    
    if($user){
        $verifyPass =$_POST['password'] === $user['password'];

        if($verifyPass){
            // Set session username
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['firstName']." ".$user['lastName'];
            $_SESSION['clearanceLevel'] = $user['clearanceLevel'];
            var_dump($user['clearanceLevel']);
            if ($user['clearanceLevel'] === "superadmin") {
                Header("Location: ../../dashboard-page.php");
            }
            else {
                Header("Location: ../../qr-page.php");
            }            
        }
        else {
            $_SESSION['message'] = "Wrong username/password";
            Header("Location: ../../login.php");
        }

    } else {
        $_SESSION['message'] = "Wrong username/password";
        Header("Location: ../../login.php");
    }
?>