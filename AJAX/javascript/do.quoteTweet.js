$(".quoteTweetButton").on("click", function(e) {
    e.preventDefault();
    const form = $('#newTweet')

    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.value, form : form.serialize()},
        url: "./AJAX/php/do.quoteTweet.php",
        success: function(data) {
            console.log(data)
            if (data == 1) {

                // success
            } else {

                // pop-up erreur
            }
        }
    })
});