<?php
session_start();
// check to see if the user is logged in
if ($_SESSION['loggedin']) {  
	header('Location: index.php');
}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GiftCowboy</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="content">
    <form action="auth.php" method="post">
      <div class="login-left-header">
        <a href="index.php"><img src="images\logo.png"></a>
      </div>
      <div class="input-icon"><i class="fas fa-user"></i></div>
      <input type="text" id="username" name="username" placeholder="Username">
      <div class="input-icon"><i class="fas fa-lock"></i></div>
      <input type="password" id="password" name="password" placeholder="Password">
      <button type="submit" id="login-button">Login</button>
      <h6>Don't have an account? <a href="signup.php">Sign up.</a></h6>
    </form>
</div>
</body>
</html>
