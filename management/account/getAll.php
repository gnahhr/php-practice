<?php
    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }
    $query = "SELECT * FROM account";
    $statement = $pdo ->prepare($query);
    $statement -> execute([]);
    $users = $statement -> fetchAll();
?>