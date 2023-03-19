$("#register-btn").click(function (e) {
    e.preventDefault()
    const form = $('#register-form')
    let str = form.serialize()
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.register.php",
        data: str,
        success: function (data) {
            if (data == "") {
                $('.errorMsg').html(`<p class='text-blue-500 font-bold mb-2'>Votre compte a bien été crée</p>`)
                setTimeout(() => {
                    $('#signInOverlay').hide()
                    $('#loginOverlay').show()
                    $('.errorMsg').html('')
                  }, 1000)
            } else {
                $('.errorMsg').html(`<p class='text-red-400 font-bold mb-2'>${data}</p>`)
            }
        }
    })
})