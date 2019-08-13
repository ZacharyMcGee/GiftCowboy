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

   if ($result->num_rows == 0) {
     $sql_add_like = "INSERT INTO favorited (accountid, giftid) VALUES ('" . $_SESSION['id'] . "' , '" . $giftid . "')";
     $result_add_like = $conn->query($sql_add_like);
        if($result_add_like) {
          echo '1';
        }
        else
        {
          echo '2';
        }
   }
   else
   {
     $sql_remove_like = "DELETE FROM favorited WHERE accountid = '" . $_SESSION['id'] . "' AND giftid = '" . $giftid . "'";
     $result_remove_like = $conn->query($sql_remove_like);
        if($result_remove_like) {
          echo '3';
        }
        else
        {
          echo '4';
        }
   }
 }
 else
 {
      echo '0';
 }
 ?>
