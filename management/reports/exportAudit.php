<?php
    require_once '../../config/db.php';

    session_start();

    if($_SESSION['clearanceLevel'] !== 'superadmin'){
        Header("Location: ../../index.php");
        exit;
    }

    $statement = $pdo -> prepare ("SELECT * FROM audit ORDER BY id DESC");
    $statement -> execute([]);
    $audits = $statement -> fetchAll();

    $headers = array(
        "Name",
        "Date",
        "Time In",
        "Office"
    );

    $file = fopen("../../csv/auditLog.csv", "w");

    fputcsv($file, $headers);

    foreach($audits as $audit) {
        fputcsv($file, $audit);
    }
    
    Header("Location: ../../audit-page.php");
    fclose($file);
?>