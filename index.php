<?php
    require_once('./config/db.php');
    session_start();
    
    if(!isset($_SESSION['clearanceLevel'])){
        Header("Location: ./login.php");
    }
    else if($_SESSION['clearanceLevel'] === "superadmin"){
        Header("Location: ./dashboard-page.php");
    } else{
        Header("Location: ./qr-page.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <h1>Hello World</h1>
</body>
</html>