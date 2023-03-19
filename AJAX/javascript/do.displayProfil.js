$(".displayProfilBtn").click(function (e) {

    e.preventDefault()

    data = {user_id: e.target.previousElementSibling.value }

    console.log(data);

    $.ajax({
        type: "get",
        url: "./AJAX/php/do.displayProfil.php",
        data: data,
        success: function (data) {
            document.location.href="profil"
        }
    })
})