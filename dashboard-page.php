<?php
session_start();
if(!isset($_SESSION['clearanceLevel']) || $_SESSION['clearanceLevel'] !== "superadmin") {
  Header("Location: /index.php");
}
require_once('./config/db.php');
require_once('./management/account/getAll.php');
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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./dashboard-page.css">
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
          <li><a href="./qr-scanner-page.php">QR Code Scanner</a></li>
          <li><a href="./qr-page.php">QR Code</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION['name'] ?></a></li>
          <li><a href="./management/account/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="dashboard-page">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Clearance Level</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['firstName']; ?></td>
            <td><?php echo $user['lastName']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['clearanceLevel']; ?></td>
            <td>
              <div class="dashboard-page__button-container">
                <a href="./management/account/delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-block">Delete</a>
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#flipFlop">Update</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Clearance Level</th>
          <th>
            Actions
          </th>
        </tr>
      </tfoot>
    </table>

    <!-- The Update modal -->
    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabel">Update Account</h4>
          </div>
          <div class="modal-body">
            <div class="login__form">
              <form method="POST" action="./management/account/update.php">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="id" type="text" class="form-control" name="id" placeholder="ID">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="firstName" type="firstName" class="form-control" name="firstName" placeholder="First Name">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="lastName" type="lastName" class="form-control" name="lastName" placeholder="Last Name">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="clearanceLevel" type="text" class="form-control" name="clearanceLevel" placeholder="Clearance Level">
                </div>
                <br>
                <button class="button-86" role="button">Submit</button>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <a href="./management/reports/exportAccounts.php" class="export-button btn btn-success btn-block">Export Accounts</a>

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
          <button class="button-49" role="button">CCS Days 2022</button>
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