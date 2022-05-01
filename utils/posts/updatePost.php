<?php
    include_once('../../config/db.php');

    $query = "UPDATE posts SET
    content = :content WHERE id = :id";

    $statement = $pdo -> prepare($query);

    $statement -> execute([
        ':content' => $_POST['content'],
        ':id' => $_POST['id']]);

    Header("Location: ../../index.php");
?>