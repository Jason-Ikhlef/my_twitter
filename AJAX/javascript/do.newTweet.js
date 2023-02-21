$(".ConfirmNewTweet").on("click", function(e) {
    e.preventDefault();
    const form = $('#newTweet')

    $.ajax({
        type: "POST",
        data: form.serialize(),
        url: "./AJAX/php/do.newTweet.php",
        success: function(data) {
            console.log(data);
            if (data == 1) {

             // redirection connexion
            } else {

                // pop-up erreur
                alert(data);
            }
        }
    })

});