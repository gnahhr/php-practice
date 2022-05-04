<?php
session_start();

if(!isset($_SESSION['clearanceLevel']) || $_SESSION['clearanceLevel'] !== "superadmin") {
  Header("Location: /index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Tracking - QR Code Page Scanner</title>
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
                <li><a href="./audit-page.php"> Audit</a></li>
                <li><a href="register.php"> Add User</a></li>
                <li><a href="./qr-scanner-page.php">QR Code Scanner</a></li>
          <?php endif; ?>
          <li><a href="./qr-page.php">QR Code</a></li>
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION['name'] ?></a></li>
          <li><a href="./management/account/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="qr-page">
    <div class="qr-page_code-container">
      <form action="submitForm()" method="get">
      <h3>Please input data</h3>
        <!-- Single button -->
<div class="btn-group">
  <button type="button" id="dropdown-val" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li onclick="actionSelect('Time in')"><a href="#">Time in</a></li>
    <li onclick="actionSelect('Time out')"><a href="#">Time out</a></li>
  </ul>
</div>

        <p style="margin-top:1em;">Please put the location of this area</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
          <input id="location" type="text" class="form-control" name="location" placeholder="Location">
        </div>

        <p style="margin-top:1em;">Please fill in your id if no QR Scanner</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="id" type="text" class="form-control" name="id" placeholder="ID Number"> 
        </div>
        <br><input type="submit" value="Submit" class="btn btn-success btn-block">
      </form>
      <h2>QR Code Scanner</h2>
      <p>Please place your QR Code inside </p>
      <div style="width: 500px" id="reader"></div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.1/html5-qrcode.min.js" integrity="sha512-cuVnjPNH3GyigomLiyATgpCoCmR9T3kwjf94p0BnSfdtHClzr1kyaMHhUmadydjxzi1pwlXjM5sEWy4Cd4WScA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function onScanSuccess(decodedText, decodedResult) {
      // Handle on success condition with the decoded text or result.
      const location = document.getElementById('location').value;
      const action = document.getElementById('dropdown-val').innerText;
      if (location !== "") {
        html5QrcodeScanner.clear();
        window.location.replace(`./management/account/scan.php?id=${decodedText}&location=${location}&=action${action}`);
      }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 10,
        qrbox: 250
      });
    html5QrcodeScanner.render(onScanSuccess);

    function actionSelect(text){
      document.getElementById('dropdown-val').innerText = text;
    }

    function submitForm(){
      const id = document.getElementById('id').innerText;
      const location = document.getElementById('location').innerText;
      const action = document.getElementById('dropdown-val').innerText;
      window.location.replace(`./management/account/scan.php?id=${decodedText}&location=${location}&action=${action}`);
    }
  </script>
</body>

</html>