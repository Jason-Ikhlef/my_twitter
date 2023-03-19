$("#login-btn").click(function (e) {
    e.preventDefault()
    const form = $('#login-form')
    let str = form.serialize()
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.login.php",
        data: str,
        success: function (data) {
            if(data == 1){
                window.location.href = 'index'
            }
            else {
                $('.errorMsg').html(`<p class='text-red-400 font-bold mb-2'>${data}</p>`)
            }
        }
    })
})