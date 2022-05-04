<?php
session_start();
require_once('./config/db.php');
require_once('./management/account/getAudit.php');

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
  <title>Attendance Tracking - Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

  <link rel="stylesheet" href="./audit-page.css">
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
          <li><a href="./dashboard-page.php">Dashboard</a></li>
          <li><a href="./audit-page.php">Audit</a></li>
          <li><a href="register.php"> Add User</a></li>
          <li><a href="./qr-page.php">QR Code</a></li>
          <li><a href="./qr-scanner-page.php">QR Code Scanner</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION['name'] ?></a></li>
          <li><a href="./management/account/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="audit-page">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Time In</th>
          <th>Office</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($audits as $audit) : ?>
          <tr>
            <td><?php echo $audit['id'] ?></td>
            <td><?php echo $audit['name'] ?></td>
            <td><?php echo $audit['date'] ?></td>
            <td><?php echo $audit['timeIn'] ?></td>
            <td><?php echo $audit['office'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Time In</th>
          <th>Office</th>
        </tr>
      </tfoot>
    </table>
    <a href="./management/reports/exportAudit.php" class="export-button btn btn-success btn-block">Export Audit</a>

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
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>