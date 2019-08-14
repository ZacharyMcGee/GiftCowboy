<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Gift Cowboy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/toggle-switch.css">
  <script src="https://kit.fontawesome.com/322089c541.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/giftcowboy.js"></script>
</head>

<body>

<div class="account-bar">
  <div class="login-signup">
    <p>Save your favorite gifts by <a href="login.php">logging in</a> or <a href="">signing up</a></p>
  </div>

  <div class="account-info">
    <a href="favorites.php">My Favorites</a>
    <p>|</p>
    <a href="account.php">My Account</a>
    <?php
    if (isset($_SESSION['loggedin'])) {
    	echo "<p>|</p><a href='logout.php'>Logout</a>";
    }
    ?>
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
  <div id="favorite-gifts" class="content">
    <div class="content-title">
      <p><img src="images/gift.png"> Favorite Gifts</p>
    </div>

  </div>

  <div id="footer" class="footer">
    <div class="footer-section">
      <div class="vertical-menu">
        <p class="active">About</p>
        <a href="#">Source</a>
        <a href="#">Information</a>
        <a href="#">Site Owner</a>
      </div>
    </div>
    <div class="footer-section">
      <div class="vertical-menu">
        <p class="active">Site</p>
        <a href="#">Login</a>
        <a href="#">Sign Up</a>
        <a href="#">My Account</a>
      </div>
    </div>
    <div class="footer-section">
      <div class="vertical-menu">
        <p class="active">Contact</p>
        <a href="#">Email</a>
        <a href="#">Suggest a Gift</a>
        <a href="#">Report a Bug</a>
      </div>
    </div>
    <div class="footer-section">
      <div class="vertical-menu">
        <p class="active">Social</p>
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
      </div>
    </div>
  </div>
</div>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
