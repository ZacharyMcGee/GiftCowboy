<div id="container" class="container">
  <div id="introduction" class="introduction">
    <p>Find the <span class="highlighted">perfect</span> gift with our gift generator</p>
  </div>

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
            <input id="1" name="age" type="radio">
            <label class="baby-label" for="1" onclick="">Baby</label>

            <input id="2" name="age" type="radio">
            <label class="toddler-label" for="2" onclick="">Toddler</label>

            <input id="3" name="age" type="radio">
            <label class="child-label" for="3" onclick="">Child</label>

            <input id="4" name="age" type="radio">
            <label class="teenager-label" for="4" onclick="">Teenager</label>

            <input id="5" name="age" type="radio">
            <label class="adult-label" for="5" onclick="">Adult</label>

            <input id="6" name="age" type="radio" checked>
            <label class="off-label" for="6" onclick="">Off</label>
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

              <div class="interest" id="funny">
                <p>Funny</p>
              </div>

              <div class="interest" id="cooking">
                <p>Cooking</p>
              </div>

              <div class="interest" id="home">
                <p>Home</p>
              </div>

              <div class="interest" id="clothing">
                <p>Clothing</p>
              </div>
          </fieldset>

        <fieldset class="fieldset-custom">
          <legend>Max Budget</legend>
          <p class="max-budget-amount" id="max-budget-amount">Search for all gifts no matter the price</p>
          <div class="slidecontainer">
            <img style="display: inline-block; float: left;" src="images/cheap.png"><input type="range" min="1" max="10" value="10" class="slider" id="max-range"><img src="images/expensive.png">
          </div>
          <a></a>
        </fieldset>

        <button id="generate" class="button">Generate Gifts</button>
  </div>
