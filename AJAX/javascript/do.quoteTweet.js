$(".quoteTweetButton").on("click", function(e) {
    e.preventDefault();
    const message = $('#quoteRetweetMsg')
    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.parentNode.value, form : message.text().trim()},
        url: "./AJAX/php/do.quoteTweet.php",
        success: function(data) {
            console.log(message);
            console.log(e.target.parentNode.value);
            if (data == 1) {

                // window.location.replace('/twitter/index')
                
            } else {

                // pop-up erreur
                alert('error')
            }
        }
    })
});