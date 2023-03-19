$(".commentButton").on("click", function(e) {
    
    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.value, form : e.target.parentNode.children[2].lastElementChild.innerText},
        url: "./AJAX/php/do.comment.php",
        success: function(data) {
            if (data == 1) {

                window.location.replace('/twitter/index')
                
            } else {

                // pop-up erreur
            }
        }
    })
});