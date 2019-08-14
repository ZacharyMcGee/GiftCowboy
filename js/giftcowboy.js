var loadIndex = 0;
var generated = false;
var curImageURL = "";
var maxBudget = 0;
var loading = false;

$(document).ready(function(){
    // Load more data
    $('#generate').click(function(){
      hideFilter();
    });

     $( '#create-product' ).on( 'click', function (evt) {
       evt.stopImmediatePropagation();
       console.log("HEY");
       createProduct();
     });

     $( '#uploadImage' ).on( 'change' , function() {
       var formData = new FormData();
       var input = $('input[type=file]')[0].files[0];
       formData.append('file', input);

       curImageURL = "images/products/" + input.name;

       var reader = new FileReader();
       reader.onload = function(e) {
         $('#preview').attr('src', e.target.result);
       }
       reader.readAsDataURL(input);

       //document.getElementById('preview').appendChild(fr);

       $.ajax({
           url : "functions/upload-image.php",
           type: "POST",
           data:  formData,
           contentType: false,
           cache: false,
           processData:false,
           success: function(response){
               alert(response);
           }
       });
     });

    $(window).scroll(function () {
      if(($(window).scrollTop() > $('body').height() / 2) && !loading) {
        if(generated == true) {
          loadProducts();
        }
      }
    });

    $("#max-range").on("input click change keyup keydown", function() {
      var amount = $("#max-range").val();

      switch(amount){
        case '1':  $("#max-budget-amount").text("Gifts less than $1.00");
                 maxBudget = 1;
                 break;
        case '2':  $("#max-budget-amount").text("Gifts less than $5.00");
                 maxBudget = 5;
                 break;
        case '3':  $("#max-budget-amount").text("Gifts less than $10.00");
                 maxBudget = 10;
                 break;
        case '4':  $("#max-budget-amount").text("Gifts less than $25.00");
                 maxBudget = 25;
                 break;
        case '5':  $("#max-budget-amount").text("Gifts less than $50.00");
                 maxBudget = 50;
                 break;
        case '6':  $("#max-budget-amount").text("Gifts less than $100.00");
                 maxBudget = 100;
                 break;
        case '7':  $("#max-budget-amount").text("Gifts less than $250.00");
                 maxBudget = 250;
                 break;
        case '8':  $("#max-budget-amount").text("Gifts less than $500.00");
                 maxBudget = 500;
                 break;
        case '9':  $("#max-budget-amount").text("Gifts less than $1000.00");
                 maxBudget = 1000;
                 break;
        case '10': $("#max-budget-amount").text("Search for all gifts no matter the price");
                 maxBudget = 0;
                 break;
      }
    });

    $( "#music" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#electronics" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#books" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#sports" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#clothing" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#games" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    $( "#pets" ).click(function() {
      $(this).toggleClass('active-interest');
    });

    if ($(location).attr('pathname').includes("favorites.php")) {
      loadFavorites();
    }
});
function loadProducts() {
  loading = true;
  generated = true;
  var mvar = "";
  var loadAmount = 10;

  var gender = $('input[name=gender]:checked', '#gender').attr('id');
  var age = $('input[name=age]:checked', '#age').attr('id');

  var interests = [];

  $(".active-interest").each(function() {
    interests.push($(this).attr('id'));
  });
      $.ajax({
          url: 'functions/load-products.php',
          type: 'post',
          data: {start:loadIndex, tag:JSON.stringify(interests), gender:gender, age:age, price:maxBudget},
          beforeSend:function(){
              $("#generate").text("Loading...");
            },
            success: function(response){
              if(response == "0")
              {
                generated = false;
                $('#gift-results').append("<div class='no-more-results'>No more results</div>")
              }
              else
              {
                var count = (response.match(/'product'/g) || []).length;
                loadIndex += count;
                // Setting little delay while displaying new content
                // appending posts after last post with class="post"
                //$(".post:last").after(response).show().fadeIn("slow");
                $('#gift-results').append(response);
                $("#generate").text("Generate");
                console.log(response);
                loading = false;
              }
            }
        });
}

function loadFavorites() {
  generated = true;
  loading = true;
  var mvar = "";
  var loadAmount = 10;

      $.ajax({
          url: 'functions/load-favorites.php',
          type: 'post',
          data: {start:loadIndex},
            success: function(response){
              var count = (response.match(/'product'/g) || []).length;
              loadIndex += count;
            // Setting little delay while displaying new content
                // appending posts after last post with class="post"
                //$(".post:last").after(response).show().fadeIn("slow");
                console.log("DONE");
                console.log(response);
                $('#favorite-gifts').append(response);
                loading = false;
                }
        });
}


function createProduct() {
  var gender = $('input[name=gender]:checked', '#gender').attr('id');
  var agefrom = $('#agefrom').val();
  var ageto = $('#ageto').val();
  var title = $('#title').val();
  var url = $('#url').val();
  var description = $('#description').val();
  var price = $('#price').val();

  var interests = [];

  $(".active-interest").each(function() {
    interests.push($(this).attr('id'));
  });
      $.ajax({
          url: 'functions/create-product.php',
          type: 'post',
          data: {imageurl:curImageURL, tag:JSON.stringify(interests), gender:gender, agefrom:agefrom, ageto:ageto, title:title, url:url, description:description, price:price},
          beforeSend:function(){
              console.log("INSIDE");
              $("#create-product").text("Loading...");
            },
            success: function(response){

                  $('#new-gift').append(response);
                  $("#create-product").text("Generate");
                }
        });
}

function hideFilter() {
  hideFooter();
  $( "#gift-filter" ).fadeOut( "slow", function() {
    var giftResultDiv = "<div class='products' id='gift-results'><div class='content-title'><p><img src='images/gift.png'> Gift Results</p></div></div>";
    $("#container").append(giftResultDiv);
    loadProducts();
  });
}

function hideFooter() {
  $( "#footer" ).fadeOut("slow");
}

function showLogin() {
  var loginDiv = "<div class='login' id='login'><div class='content-title'><p><img src='images/user.png'> Login</p></div></div>";
  $("#container").html = loginDiv;
}

function favoriteGift(id) {
  if($("#favorite-id-" + id).attr({ "src": "images/notliked.png" })) {
    $("#favorite-id-" + id).attr({ "src": "images/liked.png" });
  }
  else {
    $("#favorite-id-" + id).attr({ "src": "images/notliked.png" });
  }
  $.ajax({
      url: 'functions/favorite-gift.php',
      type: 'post',
      data: {id: id},
      success:function(response)
      {
        if(response == 1) // Liked success
        {
          if($("#favorite-id-" + id).attr({ "src": "images/notliked.png" })) {
            $("#favorite-id-" + id).attr({ "src": "images/liked.png" });
          }
        }
        else if(response == 2) // Liked error
        {
          if($("#favorite-id-" + id).attr({ "src": "images/liked.png" })) {
            $("#favorite-id-" + id).attr({ "src": "images/notliked.png" });
          }
        }
        else if(response == 3) // Unliked success
        {
          if($("#favorite-id-" + id).attr({ "src": "images/liked.png" })) {
            $("#favorite-id-" + id).attr({ "src": "images/notliked.png" });
          }
        }
        else if(response == 4) // Unliked error
        {
          if($("#favorite-id-" + id).attr({ "src": "images/notliked.png" })) {
            $("#favorite-id-" + id).attr({ "src": "images/liked.png" });
          }
        }
        else // Not logged in
        {

        }
      },
      error: function (errorThrown) {
        alert(errorThrown);
      }
  });
}

function checkSession() {
  console.log("HEY");

}
