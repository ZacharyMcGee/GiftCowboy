<?php
 session_start();
 $giftid = $_POST["id"];

 if(isset($_SESSION['loggedin']))
 {
   include_once("../config.php");

   $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT id, accountid, giftid FROM favorited WHERE accountid = " . $_SESSION['id'] . " AND giftid = " . $giftid;

   $result = $conn->query($sql);
   if (!$result) {
     echo '1';
   }
   else {
     echo '2';
   }
 }
 else
 {
      echo '0';
 }
 ?>
