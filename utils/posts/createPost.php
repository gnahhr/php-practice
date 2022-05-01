<?php
    include_once('../../config/db.php');

    $query = "INSERT INTO posts(author, content) VALUES (
        :author,
        :content
    )";

    $statement = $pdo -> prepare($query);

    $statement -> execute([
        ':author' => $_POST['author'],
        ':content' => $_POST['content']
    ]);

    Header("Location: ../../index.php");
?>