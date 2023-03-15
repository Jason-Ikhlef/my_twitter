$(".quoteTweetButton").on("click", function(e) {
    e.preventDefault();
    const message = $('#tweetMessage')
    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.value, form : message.text().trim()},
        url: "./AJAX/php/do.quoteTweet.php",
        success: function(data) {
            console.log(data);
            if (data == 1) {

                window.location.replace('/twitter/index')
                
            } else {

                // pop-up erreur
                alert('error')
            }
        }
    })
});