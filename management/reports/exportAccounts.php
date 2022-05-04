<?php
    require_once '../../config/db.php';

    session_start();

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }

    $statement = $pdo -> prepare ("SELECT * FROM account");
    $statement -> execute([]);
    $accounts = $statement -> fetchAll();

    $headers = array(
        "ID",
        "First Name",
        "Last Name",
        "Email",
        "Password",
        "Clearance level"
    );

    $file = fopen("../../csv/accounts.csv", "w");

    fputcsv($file, $headers);

    foreach($accounts as $account) {
        fputcsv($file, $account);
    }
    
    Header("Location: ../../dashboard-page.php");
    fclose($file);
?>