$(".ConfirmNewTweet").on("click", function(e) {
    e.preventDefault();
    const message = $('#tweetMessage')
    
    $.ajax({
        type: "POST",
        data: {message : message.text().trim()},
        url: "./AJAX/php/do.newTweet.php",
        success: function(data) {
            if (data != 'Message trop long' && data != 'Tweet vide') {
        
                window.location.replace('/twitter/index')
                
            } else {

                // pop-up erreur
                alert(data);
            }
        }
    })
});