$(".retweetButton").on("click", function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.value},
        url: "./AJAX/php/do.retweet.php",
        success: function(data) {

            if (data == 1) {

                
            } else {

                // pop-up erreur
            }
        }
    })
});