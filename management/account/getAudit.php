<?php
    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }
    $query = "SELECT * FROM audit";
    $statement = $pdo ->prepare($query);
    $statement -> execute([]);
    $audits = $statement -> fetchAll();
?>