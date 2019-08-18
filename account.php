<?php
session_start();
// check to see if the user is logged in
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "headings.php"; ?>

<body>

<?php include "account-bar.php"; ?>

<?php include "header.php"; ?>

<div id="container" class="container">
  <div class="account">
    <div class="content-title">
      <p><img src="images/user.png"> My Account</p>
    </div>
    <div class="account-body">
      Username:
    </div>
  </div>
</div>

<?php include "footer.php"; ?>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
