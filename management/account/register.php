<?php
    include_once('../../config/db.php');
    session_start();

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }

    $query = "SELECT * FROM account WHERE email = ?";
    $statement = $pdo ->prepare($query);
    $statement -> execute([$_POST['email']]);
    $user = $statement -> fetch(0);

    if($user){
        $_SESSION['email'] = "Email already taken.";
        Header("Location: ../../register.php");
    }

    // Prepare Query
    $query = "INSERT INTO account(firstName, lastName, email, password, clearanceLevel) VALUES (
        :firstName,
        :lastName,
        :email,
        :password,
        :clearanceLevel
    )";

    $statement = $pdo -> prepare($query);

    $statement -> execute([
        ':firstName' => $_POST['firstName'],
        ':lastName' => $_POST['lastName'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':clearanceLevel' => $_POST['clearanceLevel']
    ]);

    Header("Location: ../../dashboard-page.php");
?>