<?php
 session_start();
 $giftid = $_POST["giftid"];

 if(isset($_SESSION['loggedin']))
 {
   include_once("../config.php");

   $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT id, accountid, giftid FROM favorited WHERE accountid = " . $_SESSION['loggedid'] . " AND giftid = " . $giftid;

   $result = $conn->query($sql);
   if (!$result) {
     trigger_error('Invalid query: ' . $conn->error);
   }
 }
 else
 {
      echo '1';
 }
 ?>
