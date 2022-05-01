<?php
    include_once('../config/db.php');

    $img_dir = '../public/images/';

    if(!is_dir($img_dir)){
        mkdir($img_dir);
    }

    var_dump($_POST);
    var_dump($_FILES);

    $uploadedFile = $_FILES['picture'] ?? NULL;
    
    if ($uploadedFile) {
        $up_dir = $img_dir.$uploadedFile["name"];
        move_uploaded_file($uploadedFile['tmp_name'], $up_dir);
    }

    $query = "INSERT INTO images(name, directory) VALUES (
        :name,
        :directory
    )";

    $statement = $pdo -> prepare($query);

    $statement -> execute([
        ':name' => $uploadedFile['name'],
        ':directory' => "images/".$uploadedFile["name"]
    ]);

    Header("Location: ../index.php");
?>