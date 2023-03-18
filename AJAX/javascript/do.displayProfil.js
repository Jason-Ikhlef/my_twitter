$(".displayProfil").click(function (e) {

    e.preventDefault()

    value = $(e.target.closest("form")[0]).val();

    data = {user_id: value }

    console.log(data);

    $.ajax({
        type: "get",
        url: "./AJAX/php/do.displayProfil.php",
        data: data,
        success: function (data) {
            document.location.href="profil?"+data
        }
    })
})