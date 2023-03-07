$(".likeButton").on("click", function(e) {
    if (e.target.classList[2] == "fa-solid") {
        e.preventDefault();
        $.ajax({
            type: "POST",
            data: {ids : e.target.parentNode.value},
            url: "./AJAX/php/do.dislike.php",
            success: function(data) {
                console.log(data);
                if (data == 1) {

                    e.target.classList.remove('fa-solid')
                    e.target.classList.add('fa-regular')
                    e.target.parentNode.parentNode.classList.remove("text-pink-400")
                    
                } else {
                    alert("error")
                    // pop-up erreur
                }
            }
        })
    }
});