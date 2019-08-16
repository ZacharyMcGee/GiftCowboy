<?php
session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
  header('Location: index.php');
}
else
{
require_once '../config.php';
$conn = mysqli_connect($host, $username, $password, $dbname);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn,$password);
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($conn,$email);

        $sql = "INSERT into `accounts` (username, password, email) VALUES ('$username', '".password_hash($password, PASSWORD_DEFAULT)."', '$email')";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
          echo "0";
        }
        else
        {
      echo 'Something went wrong.';
    }
  }
?>
