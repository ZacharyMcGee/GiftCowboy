<?php
 session_start();

 if(isset($_SESSION['loggedin']))
 {
      echo '0';
 }
 else
 {
      echo '1';
 }
 ?>
