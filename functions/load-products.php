<?php
include_once("../config.php");
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $start = $_POST["start"];
  $array = json_decode($_POST["tag"]);
  $age = $_POST["age"];
  $gender = $_POST["gender"];

  $genderFilter = "";
  $ageFilter = "";
  $interestFilter = "";

  $i = 0;
  foreach($array as $item) {
    if($i === 0) {
      $interestFilter .= " AND tag = '" . $item . "' OR tag2 = '" . $item . "'";
    }
    else {
      $interestFilter .= " OR tag = '" . $item . "'";
    }
    $i++;
  }

  if($gender != 'a') {
    $genderFilter .= " AND gender = '" . $gender . "'";
  }

  if($age != "off") {
    $ageFilter .= " AND age = '" . $age . "' ";
  }
  $tag = $_POST["tag"];
  $sql = "SELECT id, title, url, image, description, price, tag, tag2 FROM gifts WHERE id > " . $start . $interestFilter . $genderFilter . $ageFilter;
  $html = '';
  
$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
else {
$count = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc() AND $count < 8) {

      $html .= "<div class='product'>";
      $html .= "<div class='product-title'>";
      $html .= "<a href='" . $row["url"] . "'>" . $row["title"] . "</a>";
      $html .= "<img src='images/notliked.png'>";
      $html .= "</div>";
      $html .= "<div class='product-body'>";
      $html .= "<div class='product-image'>";
      $html .= "<div class='product-image-overlay'>";
      $html .= "<div class='product-price'>" . "$" . $row["price"] . "</div>";
      $html .= "</div>";
      $html .= "<img src='" . $row["image"] . "'>";
      $html .= "</div>";
      $html .= "<div class='product-description'>";
      $html .= "<p>" . $row["description"] . "</p>";
      $html .= "</div>";
      $html .= "<div class='product-view'>";
      $html .= "<button class='view-button'>View Now</button>";
      $html .= "</div>";
      $html .= "</div>";
      $html .= "</div>";
      $count++;
    }
} else {
    //echo "0 results";
}
echo $html;
}
$conn->close();

?>