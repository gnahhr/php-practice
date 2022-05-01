<?php
    session_start();

    //Hash Password
    $hashedPass = password_hash($_POST['firstPass'], PASSWORD_BCRYPT, array("cost" => 12));


    //Very hashed password
    $validPassword = password_verify($_POST['secondPass'], $hashedPass);

    var_dump($validPassword);

    if($validPassword){
        $_SESSION['message'] = "Password match";
    } else {
        $_SESSION['message'] = "Password mismatch";
    }
    Header('Location: ../index.php');
?>