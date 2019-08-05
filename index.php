<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Gift Cowboy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/toggle-switch.css">
  <script src="https://kit.fontawesome.com/322089c541.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/giftcowboy.js"></script>
</head>

<body>

<div class="header">
  <div class="logo">
    <img src="images/logo.png">
  </div>
</div>

<div id="container" class="container">
  <div id="gift-filter" class="content">
    <div class="content-title">
      <p><img src="images/filter.png"> Gift Filter</p>
    </div>
    <fieldset id="gender" class="fieldset-custom">
      <legend>Gender</legend>
        <div class="switch-toggle switch-candy">
          <input id="b" name="gender" type="radio">
          <label class="boy-label" for="b" onclick=""><img class="button-icon" src="images/boy.png"> Boy</label>

          <input id="g" name="gender" type="radio">
          <label class="girl-label" for="g" onclick=""><img class="button-icon" src="images/female.png"> Girl</label>

          <input id="a" name="gender" type="radio" checked>
          <label class="off-label" for="a" onclick="">Off</label>

          <a></a>
        </div>
      </fieldset>

      <fieldset id="age" class="fieldset-custom">
        <legend>Age</legend>
          <div class="switch-toggle switch-candy">
            <input id="baby" name="age" type="radio">
            <label class="baby-label" for="baby" onclick="">Baby</label>

            <input id="toddler" name="age" type="radio">
            <label class="toddler-label" for="toddler" onclick="">Toddler</label>

            <input id="child" name="age" type="radio">
            <label class="child-label" for="child" onclick="">Child</label>

            <input id="teenager" name="age" type="radio">
            <label class="teenager-label" for="teenager" onclick="">Teenager</label>

            <input id="adult" name="age" type="radio">
            <label class="adult-label" for="adult" onclick="">Adult</label>

            <input id="off" name="age" type="radio" checked>
            <label class="off-label" for="off" onclick="">Off</label>
            <a></a>
          </div>
        </fieldset>

        <fieldset class="fieldset-custom">
          <legend>Interests</legend>
              <div class="interest" id="music">
                <p>Music</p>
              </div>

              <div class="interest" id="electronics">
                <p>Electronics</p>
              </div>

              <div class="interest" id="books">
                <p>Books</p>
              </div>

              <div class="interest" id="sports">
                <p>Sports</p>
              </div>

              <div class="interest" id="clothing">
                <p>Clothing</p>
              </div>

              <div class="interest" id="games">
                <p>Games</p>
              </div>

              <div class="interest" id="pets">
                <p>Pets</p>
              </div>
          </fieldset>

        <fieldset class="fieldset-custom">
          <legend>Max Budget</legend>
          <div class="slidecontainer">
            <input type="range" min="1" max="25" value="5" class="slider" id="myRange">
          </div>
          <a></a>
        </fieldset>

        <button id="generate" class="button">Generate Gifts</button>
  </div>
</div>

<script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css"/>
</script>

</body>
</html>
