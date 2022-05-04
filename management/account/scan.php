<?php
    include_once('../../config/db.php');
    session_start();
    date_default_timezone_set("Asia/Singapore");

    $query = "SELECT * FROM account WHERE id = ?";
    $statement = $pdo ->prepare($query);
    $statement -> execute([$_GET['id']]);
    $user = $statement -> fetch(0);
    
    if (!$user){
        $_SESSION['message'] = "User not found";
        Header("Location: ../../qr-scanner-page.php");
        exit;
    }

    if($_GET['action'] === "Time in"){
        // Prepare Query
        $query = "INSERT INTO audit(userid, name, date, timeIn, office) VALUES (
            :id,
            :name,
            :date,
            :timeIn,
            :office
        )";
        $statement = $pdo -> prepare($query);

        $statement -> execute([
            ':id' => $_GET['id'],
            ':name' => $user['firstName']." ".$user['lastName'],
            ':date' => date("Y-m-d"),
            ':timeIn' => date("h:i:sa"),
            ':office' => $_GET['location']
        ]);
    } else if ($_GET['action'] === "Time out") {
        // Prepare Query
        $query = "SELECT * FROM audit WHERE userid = :id ORDER BY id DESC";
        $statement = $pdo -> prepare($query);
        $statement -> execute([
            ':id' => $_GET['id'],
        ]);
        $latest = $statement -> fetch(0);

        $query = "UPDATE audit SET
            timeOut = :timeOut
            WHERE
            userid = :id
            AND
            timeIn = :timeIn
        ";

        $statement = $pdo -> prepare($query);

        $statement -> execute([
            ':timeOut' => date("h:i:sa"),
            ':id' => $_GET['id'],
            ':timeIn' => $latest['timeIn']
        ]);
    }

    

    Header("Location: ../../qr-scanner-page.php");
?>