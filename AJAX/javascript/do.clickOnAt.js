$(document).ready(function () {

    $(".toProfile").click(function (e) {

        e.preventDefault()

        pseudo = $(this).html().slice(1)

        $.ajax({
            type: "get",
            url: "./AJAX/php/do.clickOnAt.php",
            data: { nickname: pseudo },
            success: function (data) {
                document.location.href="profil?"+pseudo
            }
        })
    })
})