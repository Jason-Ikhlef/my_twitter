$( document ).ready(function() {

  //Log in popup display

  $(".button").on("click", function() {
      $("#loginOverlay").removeClass("hidden");
      $("#loginOverlay").addClass("block");
  });

  $(".close").on("click", function() {
      $("#loginOverlay").removeClass("block");
      $("#loginOverlay").addClass("hidden");
  });

  //Sign in popup display

  $(".signInButton").on("click", function() {
      $("#signInOverlay").removeClass("hidden");
      $("#signInOverlay").addClass("block");
  });

  $(".signInClose").on("click", function() {
      $("#signInOverlay").removeClass("block");
      $("#signInOverlay").addClass("hidden");
  });
    
  //Retweet popup display

    $(".retweetButton").each(function(e){
      $(this).on('click', function() {
        if($(this).next().hasClass('block')){

          $(this).next().removeClass('block')
          $(this).next().addClass('hidden')
        } else {
  
          $(this).next().removeClass('hidden')
          $(this).next().addClass('block')
        }
      })
    })


    $('body').on('keyup',function(e){
      if(e.code == 'Escape'){
          $('#retweetOverlay').removeClass('block')
          $('#retweetOverlay').addClass('hidden')
      }
    })
})