<?php
  session_start();
  
  if(!isset($_SESSION)){
    Header("Location: ./login.php");
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
    <link rel="stylesheet" href="./qr-page.css">
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
            <a class="navbar-brand" href="#">Attendance Tracking</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <?php if($_SESSION['clearanceLevel'] === "superadmin"): ?>
                <li><a href="./dashboard-page.php">Dashboard</a></li>
                <li><a href="./audit-page.php">Audit</a></li>
                <li><a href="./register.php"> Add User</a></li>
                <li><a href="./qr-scanner-page.php">QR Code Scanner</a></li>
              <?php endif; ?>
              <li><a href="./qr-page.php">QR Code</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="username-display"><?php echo $_SESSION['name'] ?></a></li>
              <li><a href="./management/account/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="qr-page">
      <div class="qr-page_code-container">
        <h2>Your QR Code</h2>
        <p>Please scan when going in and out of an area</p>
        <div id="qrcode"><?php echo "<p id='data'>".$_SESSION['id']."</p>"; ?></div>
      </div>
      
    </div>
    <div class="footer">
        <div class="container">
            <div class="about-company">
              <div class="div">  <img src="./images/jaguar.png" alt=""></div>
              <div class="div">
                <h2>Jaguar Amaranth</h2>
                <p class="pr-5 text-white-50">"Your talent is God's gift to you. What you do with it is your gift back to God." </p>
              </div>
              <div class="links">
                <button class="button-49" role="button">CCS Days 2022</button>
                  <p class="copyright"><small class="text-white-50">© 2022. All Rights Reserved.</small></p>
              </div>
            </div>
        </div>
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      new QRCode(document.getElementById("qrcode"), document.getElementById("data").innerText);
    </script>
      </body>
    
</html>