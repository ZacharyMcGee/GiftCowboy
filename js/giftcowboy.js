var loadIndex = 0;
var generated = false;
var curImageURL = "";

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
      if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
        if(generated == true) {
          loadProducts();
        }
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
});

function loadProducts() {
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
          data: {start:loadIndex, tag:JSON.stringify(interests), gender:gender, age:age},
          beforeSend:function(){
              $("#generate").text("Loading...");
            },
            success: function(response){
              var count = (response.match(/'product'/g) || []).length;
              loadIndex += count;
            // Setting little delay while displaying new content
                // appending posts after last post with class="post"
                //$(".post:last").after(response).show().fadeIn("slow");
                  $('#gift-results').append(response);
                  $("#generate").text("Generate");
                }
        });
}


function createProduct() {
  var gender = $('input[name=gender]:checked', '#gender').attr('id');
  var age = $('input[name=age]:checked', '#age').attr('id');
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
          data: {imageurl:curImageURL, tag:JSON.stringify(interests), gender:gender, age:age, title:title, url:url, description:description, price:price},
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
  $( "#gift-filter" ).fadeOut( "slow", function() {
    var giftResultDiv = "<div class='products' id='gift-results'><div class='content-title'><p><img src='images/gift.png'> Gift Results</p></div></div>";
    $("#container").append(giftResultDiv);
    loadProducts();
  });
}

function showLogin() {
  var loginDiv = "<div class='login' id='login'><div class='content-title'><p><img src='images/user.png'> Login</p></div></div>";
  $("#container").html = loginDiv;
}
