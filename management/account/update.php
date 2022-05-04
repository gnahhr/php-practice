<?php
    include_once('../../config/db.php');
    session_start();

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }

    // Prepare Query
    $query = "UPDATE account SET
        firstName = :firstName,
        lastName = :lastName,
        email = :email,
        password = :password,
        clearanceLevel = :clearanceLevel
        WHERE
        id = :id
    ";

    $statement = $pdo -> prepare($query);

    $statement -> execute([
        ':firstName' => $_POST['firstName'],
        ':lastName' => $_POST['lastName'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':clearanceLevel' => $_POST['clearanceLevel'],
        ':id' => $_POST['id']
    ]);

    Header("Location: ../../index.php");
?>