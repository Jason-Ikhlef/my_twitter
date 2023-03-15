$( document ).ready(function() {
  //Log in popup display

  $(".button").on("click", function() {
      $("#loginOverlay").removeClass("hidden");
      $("#loginOverlay").addClass("block");
      $('body').addClass('overflow-hidden')
  });

  $(".close").on("click", function() {
      $("#loginOverlay").removeClass("block");
      $("#loginOverlay").addClass("hidden");
      $('body').removeClass('overflow-hidden')
  });

  //Sign in popup display

  $(".signInButton").on("click", function() {
      $("#signInOverlay").removeClass("hidden");
      $("#signInOverlay").addClass("block");
      $('body').addClass('overflow-hidden')
  });

  $(".signInClose").on("click", function() {
      $("#signInOverlay").removeClass("block");
      $("#signInOverlay").addClass("hidden");
      $('body').removeClass('overflow-hidden')
  });
    
  //Retweet popup display
    
    $(".retweetButton").each(function(e){
      $(this).on('click', function() {
        if($(this).next().hasClass('block')){

          $(this).next().removeClass('block')
          $(this).next().addClass('hidden')
        } 
        else {
  
          $(this).next().removeClass('hidden')
          $(this).next().addClass('block')
        }
      })
    })

    $('body').on('keyup',function(e){
      if(e.code == 'Escape'){
        $('.retweetOverlay').removeClass('block')
        $('.retweetOverlay').addClass('hidden')
      }
    })
  })

  // Comment popup display

  $(".commentButton").each(function(e){
    $(this).on('click',function(){
      if($(this).next().hasClass('block')){
        $(this).next().removeClass('block')
        $(this).next().addClass('hidden')
        $('body').removeClass('overflow-hidden')
      }
      else {
        $(this).next().removeClass('hidden')
        $(this).next().addClass('block')
        $('body').addClass('overflow-hidden')
      }
    })

    $('.commentClose').on('click',function(){
      $('.commentOverlay').removeClass('block')
      $('.commentOverlay').addClass('hidden')
      $('body').removeClass('overflow-hidden')
    })

    $('body').on('keyup',function(e){
      if(e.code == 'Escape'){
        $('.commentOverlay').removeClass('block')
        $('.commentOverlay').addClass('hidden')
        $('#tweetSubmenuOverlay').removeClass('block')
        $('#tweetSubmenuOverlay').addClass('hidden')
        $('#logoutPopup').removeClass('block')
        $('#logoutPopup').addClass('hidden')
        $('body').removeClass('overflow-hidden')
      }
    })
  })

  // Tweet Submenu display

  $('.tweetWithSubmenu').on('click',function(){
    $('#tweetSubmenuOverlay').removeClass('hidden')
    $('#tweetSubmenuOverlay').addClass('block')
    $('body').addClass('overflow-hidden')
  })

  $('.tweetSubmenuClose').on('click',function(){
    $('#tweetSubmenuOverlay').removeClass('block')
    $('#tweetSubmenuOverlay').addClass('hidden')
    $('body').removeClass('overflow-hidden')
  })

// Logout display

$('.logoutDisplayOverlay').on('click',function(){
  $('#logoutPopup').removeClass('hidden')
  $('#logoutPopup').addClass('block')
})

// Carac length 


let caractersCount
let subMenuCaractersCount

if($('.postTweet')[0].value == ""){
    $('.ConfirmNewTweet').css('pointer-events','none')
    $('.ConfirmNewTweet').css('background-color','rgb(191 219 254)')
}

$('.postTweet').on('input',function (e) {
  
  caractersCount = $('.postTweet')[0].value.length
  subMenuCaractersCount = $('.postTweet')[1].value.length

  if(caractersCount > 0 || subMenuCaractersCount > 0){
    $('.checkNbOfCaracters').removeClass('hidden')
    $('.checkNbOfCaracters').addClass('block')
  }
  else {
    $('.checkNbOfCaracters').removeClass('block')
    $('.checkNbOfCaracters').addClass('hidden')
  }
  
  // accesibiliy management

  if(e.key !== 'Backspace' && caractersCount >= 140 || subMenuCaractersCount >= 140 ){
    $('.ConfirmNewTweet').css('pointer-events','none')
    $('.ConfirmNewTweet').css('background-color','rgb(191 219 254)')
  }
  
  else if(e.key !== 'Backspace' && caractersCount <= 140 || subMenuCaractersCount <= 140){
    $('.ConfirmNewTweet').css('pointer-events','auto')
    $('.ConfirmNewTweet').css('background-color','rgb(59 130 246)')
  }
  
  else if(caractersCount !== 0 && e.key == 'Backspace' || subMenuCaractersCount !== 0){
    
    if(caractersCount < 140 || subMenuCaractersCount < 140){
      $('.ConfirmNewTweet').css('pointer-events','auto')
      $('.ConfirmNewTweet').css('background-color','rgb(59 130 246)')
    }
  }

  // width management

  if(caractersCount < 140 && subMenuCaractersCount < 140){
    $('.countCaracters').css('width',`${caractersCount}px`)
    $('.subMenuCountCaracters').css('width',`${subMenuCaractersCount}px`)
  }
  else {
    $('.countCaracters').css('width',`140px`)
    $('.subMenuCountCaracters').css('width','140px')
  }
  
  // colors management

  if(caractersCount > 0 && caractersCount <= 50 || subMenuCaractersCount > 0 && subMenuCaractersCount <= 50){
    $('.countCaracters').css('background-color','rgb(74 222 128)')
    $('.subMenuCountCaracters').css('background-color','rgb(74 222 128)')
  }
  else if(caractersCount > 50 && caractersCount <= 100 || subMenuCaractersCount > 50 && subMenuCaractersCount <= 100){
    $('.countCaracters').css('background-color','rgb(250 204 21)')
    $('.subMenuCountCaracters').css('background-color','rgb(250 204 21)')
  }
  else if(caractersCount > 100 && caractersCount <= 120 || subMenuCaractersCount > 100 && subMenuCaractersCount <= 120){
    $('.countCaracters').css('background-vvevecolor','rgb(251 146 60)')
    $('.subMenuCountCaracters').css('background-color','rgb(251 146 60)')
  }
  else if(caractersCount > 120 || subMenuCaractersCount > 120) {
    $('.countCaracters').css('background-color','rgb(248 113 113)')
    $('.subMenuCountCaracters').css('background-color','rgb(248 113 113)')
  }
 })