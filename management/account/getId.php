<?php
    session_start();
    include_once('../../config/db.php');

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }
    
    $query = "SELECT * FROM account WHERE id = ?";
    $statement = $pdo ->prepare($query);
    $statement -> execute([$_GET['id']]);
    $user = $statement -> fetch(0);

    if(!$user){
        $_SESSION['message'] = "User doesn't exist.";
        Header("Location: ../../index.php");
    }

    Header("Location: ../../index.php");
?>