<?php
    include_once('../../config/db.php');

    $query = "DELETE FROM posts WHERE id = ?";

    $statement = $pdo -> prepare($query);

    $statement -> execute([$_GET['id']]);

    Header("Location: ../../index.php");
?>