$("#editBtn").click(function (e) {
    e.preventDefault();
    const form = $("#editForm")
    let str = form.serialize()
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.editUser.php",
        data: str,
        success: function (data) {
            console.log(data)
            // location.reload()
            // setTimeout('document.location.href="profil.php"',  1000)
        }
    });
});