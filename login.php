<?php
  session_start();
  
  if(isset($_SESSION['name'])){
    Header("Location: ./index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Tracking - Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./login.css">
  <link rel="stylesheet" href="./css/global.css">
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Attendance Tracking</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="login">
    <div class="login__form">
      <h2 class="mb-5">User Login</h2>
      <h4 class="mb-6">Attendance Monitoring catered by university</h4>

      <form action="./management/account/login.php" method="POST">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="username" type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <br>
        <button class="button-86" role="button">Submit</button>
      </form>
    </div>
  </div>
  <div class="footer">
    <div class="container">

      <div class="about-company">
        <div class="div"> <img src="./images/jaguar.png" alt=""></div>

        <div class="div">
          <h2>Jaguar Amaranth</h2>
          <p class="pr-5 text-white-50">"Your talent is God's gift to you. What you do with it is your gift back to God." </p>
        </div>

        <div class="links">
          <button class="button-49" role="button">CSS Days 2022</button>
          <p class="copyright"><small class="text-white-50">© 2022. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>