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
  <div id="gift-filter" class="content">
    <div class="content-title">
      <p><img src="images/filter.png"> Gift Filter</p>
    </div>
    <fieldset id="gender" class="fieldset-custom">
      <legend>Gender</legend>
        <div class="switch-toggle switch-candy">
          <input id="b" name="gender" type="radio">
          <label class="boy-label" for="b" onclick=""><img class="button-icon" src="images/boy.png"> Boy</label>

          <input id="g" name="gender" type="radio">
          <label class="girl-label" for="g" onclick=""><img class="button-icon" src="images/female.png"> Girl</label>

          <input id="a" name="gender" type="radio" checked>
          <label class="off-label" for="a" onclick="">Off</label>

          <a></a>
        </div>
      </fieldset>

      <fieldset id="age" class="fieldset-custom">
        <legend>Age</legend>
          <div class="switch-toggle switch-candy">
            <input id="1" name="age" type="radio">
            <label class="baby-label" for="1" onclick="">Baby</label>

            <input id="2" name="age" type="radio">
            <label class="toddler-label" for="2" onclick="">Toddler</label>

            <input id="3" name="age" type="radio">
            <label class="child-label" for="3" onclick="">Child</label>

            <input id="4" name="age" type="radio">
            <label class="teenager-label" for="4" onclick="">Teenager</label>

            <input id="5" name="age" type="radio">
            <label class="adult-label" for="5" onclick="">Adult</label>

            <input id="6" name="age" type="radio" checked>
            <label class="off-label" for="6" onclick="">Off</label>
            <a></a>
          </div>
        </fieldset>

        <fieldset class="fieldset-custom">
          <legend>Interests</legend>
              <div class="interest" id="music">
                <p>Music</p>
              </div>

              <div class="interest" id="electronics">
                <p>Electronics</p>
              </div>

              <div class="interest" id="books">
                <p>Books</p>
              </div>

              <div class="interest" id="sports">
                <p>Sports</p>
              </div>

              <div class="interest" id="clothing">
                <p>Clothing</p>
              </div>

              <div class="interest" id="games">
                <p>Games</p>
              </div>

              <div class="interest" id="pets">
                <p>Pets</p>
              </div>
          </fieldset>

        <fieldset class="fieldset-custom">
          <legend>Max Budget</legend>
          <p class="max-budget-amount" id="max-budget-amount">Search for all gifts no matter the price</p>
          <div class="slidecontainer">
            <img style="display: inline-block; float: left;" src="images/cheap.png"><input type="range" min="1" max="10" value="10" class="slider" id="max-range"><img src="images/expensive.png">
          </div>
          <a></a>
        </fieldset>

        <button id="generate" class="button">Generate Gifts</button>
  </div>

  <div class="footer">
  </div>
</div>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
