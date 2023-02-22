$(".ConfirmNewTweet").on("click", function(e) {
    e.preventDefault();
    const form = $('#newTweet')

    $.ajax({
        type: "POST",
        data: form.serialize(),
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