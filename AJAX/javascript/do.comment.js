$(".commentButton").on("click", function(e) {
    const message = $('#newCommentArea')
    
    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.value, form : message.text().trim()},
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