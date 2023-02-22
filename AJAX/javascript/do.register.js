$("#registerBtn").click(function (e) {
    e.preventDefault()

    console.log ("coucou")
    const form = $('#register-form')
    let str = form.serialize()
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.register.php",
        data: str,
        success: function (data) {
            console.log (data)
            if (data == "") {
                $(".display-error").html("gg bro")
            } else {
                $(".display-error").html(data)
            }
        }
    })
})