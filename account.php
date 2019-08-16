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


<?php include "footer.php"; ?>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
