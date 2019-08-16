<?php
session_start();
// check to see if the user is logged in
if (isset($_SESSION['loggedin'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Gift Cowboy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.css"/>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/toggle-switch.css">
  <script src="https://kit.fontawesome.com/322089c541.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
  <script src="js/giftcowboy.js"></script>
</head>

<body>

<?php include "account-bar.php"; ?>

<?php include "header.php"; ?>

<div id="container" class="container">
  <div id="login-form" class="login-form" style="height: 390px !important;">
    <div class="login-title">
      <p>Sign up to GiftCowboy</p>
    </div>

    <div id="login-error">

    </div>

    <div class="login">

  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form onsubmit="signup(this);return false">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" class="form-control" type="text" name='email' placeholder="Email"/>
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" class="form-control" type="text" name='username' placeholder="Username"/>
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" class="form-control" type="password" name='password' placeholder="Password"/>
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="confirmpassword" class="form-control" type="password" name='confirmpassword' placeholder="Confirm Password"/>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
            </label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-def btn-block">Sign Up</button>
          </div>
          <div class="form-group text-center">
            <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
          </div>
        </form>
      </div>
    </div>
  </div>

    </div>
  </div>
</div>

<?php include "footer.php" ?>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
