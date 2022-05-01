<?php
    require_once('./config/db.php');
    
    $statement = $pdo -> prepare("SELECT * FROM posts");
    $statement -> execute([]);
    $posts = $statement -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Hehet</title>
</head>
<body>
    <h1>Comments</h1>

    <?php foreach ($posts as $p): ?>
        <div class="comment">
            <h3 class="comment-author">Author: <?php echo $p["author"] ?></h3>
            <h4 class="comment-id">ID: <?php echo $p["id"] ?></h3>
            <p class="comment-content"><?php echo $p["content"] ?></p>
            <a href="#" class="edit">Edit</a>
            <a href="./utils/posts/deletePost.php?id=<?php echo $p["id"] ?>" class="delete">Delete</a>
        </div>
    <?php endforeach; ?>

    <div class="modal" id=modal>
        <form action="./utils/posts/updatePost.php" method="post">
            <h3>Edit a comment:</h3>
            <input type="text" name="id" id="id" placeholder="id">
            <input type="text" name="content" id="content"><br>
            <input type="submit" value="Save">
            <a href="#">Close</a>
        </form>
    </div>

    <form action="./utils/posts/createPost.php" method="post">
        <h3>Write a comment:</h3>
        <input type="text" name="author" id="author" placeholder="author">
        <input type="text" name="content" id="content" placeholder="content"> <input type="submit" value="Comment">
    </form>

    <form action="" method="post">
        <h2>Insert Picture</h2>
    </form>

    <script src="./script.js"></script>
</body>
</html>