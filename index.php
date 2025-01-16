<?php 
require 'process/login.php';

if (isset($_SESSION['username'])) {
    if ($_SESSION['type'] == 'user') {
        header('location: page/user/dashboard.php');
        exit;
    } elseif ($_SESSION['type'] == 'admin') { 
        header('location: page/admin/admin.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tube Inspection</title>

  <link rel="icon" href="dist/img/tir-logo.png" type="image/x-icon" >
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="dist/css/font.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
    body {
      background: url('dist/img/tubebg.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .form-box{


        background-color:#20c997;
        padding-top: 40px;
    }
  </style>

<div class="form-box">
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="dist/img/tir-logo.png" style="height:150px; ">
      <h2 style="color:white;"><b>Tube Inspection</h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
       

        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="login_form">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
          <div class="col">
          <button type="submit" class="btn btn-block" name="Login" value="login" style="background-color: #20c997; border-color: #20c997; color: white;">Login</button>
          <button type="submit" class="btn btn-block" name="Login" value="login" style="background-color:rgb(100, 100, 100); border-color:rgb(100, 100, 100); color: white;">Work Instruction</button>
          </div>

          </div>
          <div class="row">
            <div class="col">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


</body>
</html>
