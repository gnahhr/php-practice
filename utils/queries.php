<?php
    //If not set, get all products from query
    if (!isset($_GET['search']) || ($_GET['search'] === '')) {
        $statement = $pdo -> prepare("SELECT * FROM products");
        $statement ->execute();
        $products = $statement -> fetchAll();
    } else {
        //Get products with the same productName or productCategory as the $search variable
        $search = $_GET['search'];
        $statement = $pdo -> prepare("SELECT * FROM products WHERE productName LIKE '%$search%' OR productCategory LIKE '%$search%'");
        $statement -> execute();
        $products = $statement -> fetchAll();
    }

    // $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
?>