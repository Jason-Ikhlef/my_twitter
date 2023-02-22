$("#loginBtn").click(function (e) {
    e.preventDefault()
    const form = $('#login-form')
    let str = form.serialize()
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.login.php",
        data: str,
        success: function (data) {
            console.log(data);
            if (data == 1) {
                setTimeout('document.location.href="index.php"',  1000)
            }
        }
    })
})