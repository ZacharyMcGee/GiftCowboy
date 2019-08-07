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
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/toggle-switch.css">
  <script src="https://kit.fontawesome.com/322089c541.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/giftcowboy.js"></script>
</head>

<body>

<div class="account-bar">
  <div class="login-signup">
    <p>Save your favorite gifts by <a href="">logging in</a> or <a href="">signing up</a></p>
  </div>

  <div class="account-info">
    <a href="favorites.php">My Favorites</a>
    <p>|</p>
    <a href="account.php">My Account</a>
  </div>
</div>

<div class="header">
  <div class="logo">
    <a href="index.php"><img src="images/logo.png"></a>
  </div>

  <div class="menu">
  <ul class="menu-ul">
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#news">Top Rated</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
  </ul>
</div>
</div>

<div id="container" class="container">
  <div id="login-form" class="login-form">
    <div class="login-title">
      <p>Login or Sign Up</p>
    </div>

    <div class="login">

  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form action="auth.php" method="post" id="loginForm">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="text" name='username' placeholder="username"/>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password"/>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
            </label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-def btn-block">Login</button>
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

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
