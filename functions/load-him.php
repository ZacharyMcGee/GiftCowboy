<?php
include_once("../config.php");
session_start();
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  $start = $_POST["start"];

  $sql = "SELECT id, title, url, image, description, price, tag, tag2 FROM gifts WHERE gender = 'b' AND id > " . $start;
  $html = '';

$result = $conn->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
else {
$count = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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
} else {
    echo "0";
}
echo $html;
}
$conn->close();
?>
