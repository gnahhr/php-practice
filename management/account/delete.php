<?php
    include_once('../../config/db.php');
    session_start();

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

    // Prepare Query
    $query = "DELETE FROM account WHERE id = :id";

    $statement = $pdo -> prepare($query);
    $statement -> execute([
        ':id' => $_GET['id']
    ]);

    var_dump($_GET);

    $_SESSION['message'] = "User deleted.";

    Header("Location: ../../index.php");
?>