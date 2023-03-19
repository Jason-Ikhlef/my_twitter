$(".followButton").click(function (e) {
    e.preventDefault()

    const str = $('.followButton').attr("id")

    $.ajax({
        type: "post",
        url: "./AJAX/php/do.follow.php",
        data: { follow: str },
        success: function (data) {
            $count = Number($('.followed span').html())

            if ($('.followButton').html() == "Ne plus suivre"){

                $('.followButton').html("Suivre")
                $count--
                $('.followed span').html($count)
            } else {

                $('.followButton').html("Ne plus suivre")
                $count++
                $('.followed span').html($count)
            }
        }
    })
})