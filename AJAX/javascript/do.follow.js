$(".followButton").click(function (e) {
    e.preventDefault()

    const str = $('.followButton').attr("id")

    $.ajax({
        type: "post",
        url: "./AJAX/php/do.follow.php",
        data: { follow: str },
        success: function (data) {
            console.log(data);
        }
    })
})