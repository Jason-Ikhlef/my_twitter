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

              alert('Tweet posté')
            } else if (data == 'empty') {

                alert('Tweet vide')
            } else if (data == 'tooLong') {

                alert('Tweet trop long')
            } else {

                alert('Erreur')
            }
        }
    })

});