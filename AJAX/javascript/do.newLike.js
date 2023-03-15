$(".likeButton").on("click", function(e) {
    if (e.target.classList[2] == "fa-regular") {
        e.preventDefault();

        $.ajax({
            type: "POST",
            data: {ids : e.target.parentNode.value},
            url: "./AJAX/php/do.newLike.php",
            success: function(data) {

                if (data == 1) {

                    e.target.parentNode.parentNode.lastElementChild.innerHTML++;
                    e.target.classList.remove('fa-regular')
                    e.target.classList.add('fa-solid')
                    e.target.parentNode.parentNode.classList.add("text-pink-400")
                    
                } else {
                    alert("error")
                    // pop-up erreur
                }
            }
        })
    }
});