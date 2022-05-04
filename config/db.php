<?php
     $pdo = new PDO('mysql:host=localhost;port=3306;dbname=jaguaramaranth','root','');
     
     //FETCH ASSOC
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     //ERROR HANDLING
     $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>