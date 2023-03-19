if(!localStorage.getItem('theme')){
    localStorage.setItem('theme','light')
}

$('.lightTheme').on('click',function(){

    if(localStorage.getItem('theme') == 'dark'){
        $('body').removeClass(localStorage.getItem('theme'))
        localStorage.setItem('theme','light')
        $('body').addClass(localStorage.getItem('theme'))
        $(this).html(`
            <i class="fa-solid fa-sun p-4 mx-auto rounded-full hover:bg-gray-100"></i>
            <p class='hidden xl:block text-xl mt-3 '>${localStorage.getItem('theme')}</p>
        `)
    }

    else {
        
        $('body').removeClass(localStorage.getItem('theme'))
        localStorage.setItem('theme','dark')
        $('body').addClass(localStorage.getItem('theme'))
        $(this).html(`
            <i class="fa-solid fa-moon p-4 mx-auto rounded-full hover:bg-gray-100"></i>
            <p class='hidden xl:block text-xl mt-3 '>${localStorage.getItem('theme')}</p>
        `)
    }
})

$(document).ready(function () {
    //Log in popup display

    $(".logInButton").on("click", function () {
        $("#loginOverlay").removeClass("hidden");
        $("#loginOverlay").addClass("block");
    });

    $(".logInClose").on("click", function () {
        $("#loginOverlay").removeClass("block");
        $("#loginOverlay").addClass("hidden");
    });

    $(".logInSwitchButton").on("click", function () {
        $("#loginOverlay").removeClass("block");
        $("#loginOverlay").addClass("hidden");

        $("#signInOverlay").removeClass("hidden");
        $("#signInOverlay").addClass("block");
    });

    $(".signInButton").on("click", function () {
        $("#signInOverlay").removeClass("hidden");
        $("#signInOverlay").addClass("block");
        $("body").addClass("overflow-hidden");
    });

    $(".signInClose").on("click", function () {
        $("#signInOverlay").removeClass("block");
        $("#signInOverlay").addClass("hidden");
        $("body").removeClass("overflow-hidden");
    });

    //Retweet popup display

    $(".retweetButton").each(function () {
        $(this).on("click", function () {
            if ($(this).next().hasClass("block")) {
                $(this).next().removeClass("block");
                $(this).next().addClass("hidden");
            } else {
                $(this).next().removeClass("hidden");
                $(this).next().addClass("block");
            }
        });
    });

    $("body").on("keyup", function (e) {
        if (e.code == "Escape") {
            $(".retweetOverlay").removeClass("block");
            $(".retweetOverlay").addClass("hidden");
            $('.popupRT').removeClass('block')
            $('.popupRT').addClass('hidden')
        }
    });

    $('.closeQuote').on('click',function(){
        $('.popupRT').removeClass('block')
        $('.popupRT').addClass('hidden')
        $('body').removeClass('overflow-hidden')
    })

    // Comment popup display

    $(".commentBtnOverlay").each(function () {
        $(this).on("click", function () {
            if ($(this).next().hasClass("block")) {
                $(this).next().removeClass("block");
                $(this).next().addClass("hidden");
                $("body").removeClass("overflow-hidden");
            } else {
                $(this).next().removeClass("hidden");
                $(this).next().addClass("block");
                $("body").addClass("overflow-hidden");
            }
            $('body').on('keyup',function(e){
                if(e.code == 'Escape'){
                    $('.commentBtnOverlay').next().removeClass('block')
                    $('.commentBtnOverlay').next().addClass('hidden')
                }
            })
        });
    });

    $(".displayQuoteTweet").each(function(){
        $(this).on('click',function(){
            if ($(this).next().hasClass("block")) {
                $(this).next().removeClass("block");
                $(this).next().addClass("hidden");
                $("body").removeClass("overflow-hidden");
            } else {
                $(this).next().removeClass("hidden");
                $(this).next().addClass("block");
                $("body").addClass("overflow-hidden");
            }
            $('body').on('keyup',function(e){
                if(e.code == 'Escape'){
                    $('.commentBtnOverlay').next().removeClass('block')
                    $('.commentBtnOverlay').next().addClass('hidden')
                }
            })
        })
    })

    $(".commentClose").on("click", function () {
        $(".commentTweet").removeClass("block");
        $(".commentTweet").addClass("hidden");
        $("body").removeClass("overflow-hidden");
    });

    $("body").on("keyup", function (e) {
        if (e.code == "Escape") {
            $(".commentTweet").removeClass("block");
            $(".commentTweet").addClass("hidden");
            $("#tweetSubmenuOverlay").removeClass("block");
            $("#tweetSubmenuOverlay").addClass("hidden");
            $("#logoutPopup").removeClass("block");
            $("#logoutPopup").addClass("hidden");
            $("body").removeClass("overflow-hidden");
        }
    });

    // Tweet Submenu display

    $(".tweetWithSubmenu").on("click", function () {
        $("#tweetSubmenuOverlay").removeClass("hidden");
        $("#tweetSubmenuOverlay").addClass("block");
        $("body").addClass("overflow-hidden");
    });

    $(".tweetSubmenuClose").on("click", function () {
        $("#tweetSubmenuOverlay").removeClass("block");
        $("#tweetSubmenuOverlay").addClass("hidden");
        $("body").removeClass("overflow-hidden");
    });

    // Logout display

    $(".logoutDisplayOverlay").on("click", function () {
        $("#logoutPopup").removeClass("hidden");
        $("#logoutPopup").addClass("block");
    });

    // Carac length

    // let caractersCount
    // let subMenuCaractersCount

    // console.log($('.newTweetArea'));
    // if($('.newTweetArea')[0].value == ""){
    //     $('.ConfirmNewTweet').css('pointer-events','none')
    //     $('.ConfirmNewTweet').css('background-color','rgb(191 219 254)')
    // }

    // $('.newTweeetArea').on('input',function (e) {
    //     console.log('oui');
    // })
    //   caractersCount = $('.postTweet')[0].value.length
    //   subMenuCaractersCount = $('.postTweet')[1].value.length

    //   if(caractersCount > 0 || subMenuCaractersCount > 0){
    //     $('.checkNbOfCaracters').removeClass('hidden')
    //     $('.checkNbOfCaracters').addClass('block')
    //   }
    //   else {
    //     $('.checkNbOfCaracters').removeClass('block')
    //     $('.checkNbOfCaracters').addClass('hidden')
    //   }

    //   // accesibiliy management

    //   if(e.key !== 'Backspace' && caractersCount >= 140 || subMenuCaractersCount >= 140 ){
    //     $('.ConfirmNewTweet').css('pointer-events','none')
    //     $('.ConfirmNewTweet').css('background-color','rgb(191 219 254)')
    //   }

    //   else if(e.key !== 'Backspace' && caractersCount <= 140 || subMenuCaractersCount <= 140){
    //     $('.ConfirmNewTweet').css('pointer-events','auto')
    //     $('.ConfirmNewTweet').css('background-color','rgb(59 130 246)')
    //   }

    //   else if(caractersCount !== 0 && e.key == 'Backspace' || subMenuCaractersCount !== 0){

    //     if(caractersCount < 140 || subMenuCaractersCount < 140){
    //       $('.ConfirmNewTweet').css('pointer-events','auto')
    //       $('.ConfirmNewTweet').css('background-color','rgb(59 130 246)')
    //     }
    //   }

    //   // width management

    //   if(caractersCount < 140 && subMenuCaractersCount < 140){
    //     $('.countCaracters').css('width',`${caractersCount}px`)
    //     $('.subMenuCountCaracters').css('width',`${subMenuCaractersCount}px`)
    //   }
    //   else {
    //     $('.countCaracters').css('width',`140px`)
    //     $('.subMenuCountCaracters').css('width','140px')
    //   }

    //   // colors management

    //   if(caractersCount > 0 && caractersCount <= 50 || subMenuCaractersCount > 0 && subMenuCaractersCount <= 50){
    //     $('.countCaracters').css('background-color','rgb(74 222 128)')
    //     $('.subMenuCountCaracters').css('background-color','rgb(74 222 128)')
    //   }
    //   else if(caractersCount > 50 && caractersCount <= 100 || subMenuCaractersCount > 50 && subMenuCaractersCount <= 100){
    //     $('.countCaracters').css('background-color','rgb(250 204 21)')
    //     $('.subMenuCountCaracters').css('background-color','rgb(250 204 21)')
    //   }
    //   else if(caractersCount > 100 && caractersCount <= 120 || subMenuCaractersCount > 100 && subMenuCaractersCount <= 120){
    //     $('.countCaracters').css('background-vvevecolor','rgb(251 146 60)')
    //     $('.subMenuCountCaracters').css('background-color','rgb(251 146 60)')
    //   }
    //   else if(caractersCount > 120 || subMenuCaractersCount > 120) {
    //     $('.countCaracters').css('background-color','rgb(248 113 113)')
    //     $('.subMenuCountCaracters').css('background-color','rgb(248 113 113)')
    //   }
    //  })

    //Sign in popup display

    $(".signInButton").on("click", function () {
        $("#signInOverlay").removeClass("hidden");
        $("#signInOverlay").addClass("block");
    });

    $(".signInClose").on("click", function () {
        $("#signInOverlay").removeClass("block");
        $("#signInOverlay").addClass("hidden");
    });

    $(".signInSwitchButton").on("click", function () {
        $("#signInOverlay").removeClass("block");
        $("#signInOverlay").addClass("hidden");

        $("#loginOverlay").removeClass("hidden");
        $("#loginOverlay").addClass("block");
    });

    //Retweet popup display

    $(".retweetButton").on("click", function () {
        if ($("#retweetOverlay").hasClass("block")) {
            $("#retweetOverlay").removeClass("block");
            $("#retweetOverlay").addClass("hidden");
        } else {
            $("#retweetOverlay").removeClass("hidden");
            $("#retweetOverlay").addClass("block");
        }
    });

    $("body").on("keyup", function (e) {
        if (e.code == "Escape") {
            $("#retweetOverlay").removeClass("block");
            $("#retweetOverlay").addClass("hidden");
        }
    });

    //Edit profil popup

    $(".editButton").on("click", function () {
        $("#editOverlay").removeClass("hidden");
        $("#editOverlay").addClass("block");
    });

    $(".editClose").on("click", function () {
        $("#editOverlay").removeClass("block");
        $("#editOverlay").addClass("hidden");
    });

    // dark theme

});
