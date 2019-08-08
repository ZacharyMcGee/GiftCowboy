<?php
include_once("../../config.php");
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $array = json_decode($_POST["tag"]);
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $title = $_POST["title"];
  $url = $_POST["url"];
  $imageurl = $_POST["imageurl"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $tag = "";
  $tag2 = "";

  $i = 0;
  foreach($array as $item) {
    if($i === 0) {
      echo $item;
      $tag = $item;
    }
    else {
      echo $item;
      $tag2 = $item;
    }
    $i++;
  }

  $sql = "INSERT INTO gifts (title, url, image, description, price, tag, tag2, gender, age) VALUES(" . "'$title'" . ", " . "'$url'" . "," . "'$imageurl'" . ", " . "'$description'" . ",  " . "'$price'" . ", " . "'$tag'" . ", " . "'$tag2'" . ", " . "'$gender'" . ", " . "'$age'" . ")";

$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
else {
  echo "Added Gift";
}
$conn->close();

?>
