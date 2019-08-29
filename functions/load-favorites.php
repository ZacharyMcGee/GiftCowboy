<?php
 session_start();

 if(isset($_SESSION['loggedin']))
 {
   include_once("../config.php");

   $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT gifts.id, gifts.title, gifts.url, gifts.image, gifts.description, gifts.price, gifts.tag, gifts.tag2 FROM gifts INNER JOIN favorited ON gifts.id = favorited.giftid WHERE favorited.accountid = " . $_SESSION['id'];

   $result = $conn->query($sql);
   $html = '';
   $count = 0;

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc() AND $count < 8) {
         $html .= "<div class='product'>";
         $html .= "<div class='product-title'>";
         $html .= "<a href='" . $row["url"] . "'>" . $row["title"] . "</a>";

         if(isset($_SESSION['loggedin']))
         {
           $sql_favorites = "SELECT id, accountid, giftid FROM favorited WHERE accountid = " . $_SESSION['id'] . " AND giftid = " . $row["id"];

           $result_favorites = $conn->query($sql_favorites);

           if ($result_favorites->num_rows == 0) {
             $html .= "<img id='favorite-id-" . $row["id"] . "' src='images/notliked.png' onclick='favoriteGift(" . $row["id"] . ")'>";
           }
           else
           {
             $html .= "<img id='favorite-id-" . $row["id"] . "' src='images/liked.png' onclick='favoriteGift(" . $row["id"] . ")'>";
           }
         }
         else
         {
           $html .= "<img id='favorite-id-" . $row["id"] . "' src='images/notliked.png' onclick='favoriteGift(" . $row["id"] . ")'>";
         }

         $html .= "</div>";
         $html .= "<div class='product-body'>";
         $html .= "<div class='product-image'>";
         $html .= "<div class='product-image-overlay'>";
         $html .= "<div class='product-price'>" . "$" . $row["price"] . "</div>";
         $html .= "</div>";
         $html .= "<a href='" . $row["url"] . "'><img class='product-image' src='" . $row["image"] . "'></a>";
         $html .= "</div>";
         $html .= "<div class='product-description'>";
         $html .= "<p>";
         $html .= "<p>";

         if (strlen($row["description"]) > 290)
         {
           $html .= substr($row["description"], 0, 290) . '...';
         }
         else
         {
           $html .= $row["description"] . "</p>";
         }

         $html .= "</div>";
         $html .= "<div class='product-view'>";
         $html .= "<a href='" . $row["url"] . "'><button class='view-button'>View Now</button></a>";
         $html .= "</div>";
         $html .= "</div>";
         $html .= "</div>";
         $count++;
       }
       echo $html;
   }
   else
   {
     echo "<div class='no-results'>You do not have any gifts favorited!</div>";
   }
 }
 else
 {
      echo '0';
 }
 ?>
