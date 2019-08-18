<div class="account-bar">
  <div class="login-signup">
    <?php
    if (isset($_SESSION['loggedin'])) {
      echo "<p>Welcome back <a href='account.php'>" . $_SESSION['name'] . "</a>!</p>";
    }
    else
    {
      echo "<p>Save your favorite gifts by <a href='login.php'>logging in</a> or <a href='signup.php'>signing up</a></p>";
    }
    ?>
  </div>

  <div class="account-info">
    <?php
    if (isset($_SESSION['loggedin'])) {
    	echo "<a href='favorites.php'>My Favorites</a><p>|</p><a href='logout.php'>Logout</a>";
    }
    else
    {
      echo "<a href='login.php'>Login</a><p>|</p><a href='signup.php'>Sign up</a>";
    }
    ?>
  </div>
</div>
