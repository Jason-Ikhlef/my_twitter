$(".quoteTweetButton").on("click", function(e) {
   
    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.parentNode.value, form : e.target.parentNode.parentNode.children[1].lastElementChild.innerText},
        url: "./AJAX/php/do.quoteTweet.php",
        success: function(data) {
            
            if (data == 1) {

                window.location.replace('/twitter/index')
                
            }
        }
    })
});