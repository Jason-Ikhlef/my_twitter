$(".commentButton").on("click", function(e) {
    e.preventDefault();
    const form = $('#newTweet')

    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.parentNode.value, form : decodeURI(form.serialize())},
        url: "./AJAX/php/do.comment.php",
        success: function(data) {
            
            if (data == 1) {

                window.location.replace('/twitter/index')
                
            } else {

                // pop-up erreur
            }
        }
    })
});