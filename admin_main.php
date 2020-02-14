<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iduwini | Login</title>
  <link rel="rel icon" href="images/dlogo.png">
  <!-- Custom fonts for this template-->
  <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
  <link href="shared/toastr.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
    
      <div class="card-header"><img style="width:250px;height:50px;" src="images/Idu_logo.png" alt="Porto Logo"><span style="float:right;">Login</span></div>
     
      <div class="card-body">
     
        <form action="login_process" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" name="log" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot_password">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="shared/toastr.min.js"></script>
  <script src="assets/js/bootstrap.bundles.min.js"></script>
  <script src="assets/js/jquery.easing.min.js"></script>
  <?php
if(isset($_SESSION['msg'])){ ?>
<script> toastr.info("<?php echo $_SESSION['msg']; ?>"); </script>
<?php } ?>
</body>
</html>
<?php
unset($_SESSION['msg']);
?>