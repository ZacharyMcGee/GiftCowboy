var loadIndex = 0;

$(document).ready(function(){
    // Load more data
    $('#generate').click(function(){
      loadProducts();
    });

    $(window).scroll(function () {
      if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
        loadProducts();
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
  var mvar = "";
  var loadAmount = 10;

  var gender = $('input[name=gender]:checked', '#gender').attr('id');
  var age = $('input[name=age]:checked', '#age').attr('id');

  var interests = [];

  $(".active-interest").each(function() {
    interests.push($(this).attr('id'));
  });
  console.log(interests);
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
