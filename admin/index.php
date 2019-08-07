<?php
session_start();
if(!isset($_SESSION["loggedin"])){
header("Location: ../login.php");
exit();
}
else {
  include_once("../config.php");

  $conn = new mysqli($host, $username, $password, $dbname);

  $sql = "SELECT id, username, priviledge FROM accounts WHERE id = " . $_SESSION["id"];
  $result = $conn->query($sql);

  if (!$result) {
    header("Location: ../login.php");
  }
  else
  {
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row["priviledge"] == 1){
          echo "admin";
        }
        else {
          header("Location: ../login.php");
        }
      }
  }
  else
  {
    header("Location: ../login.php");
  }
  }
  $conn->close();
}
?>
