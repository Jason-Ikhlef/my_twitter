$(".retweetButton").on("click", function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        data: {tweet_id : e.target.parentNode.value},
        url: "./AJAX/php/do.retweet.php",
        success: function(data) {
            
            if (data == 1) {
                let rtButton = e.target.parentNode.parentNode.parentNode.parentNode.firstElementChild

                if (rtButton.classList.value.includes('hover:text-blue-400')) {

                    rtButton.classList.value = rtButton.classList.value.replace('hover:text-blue-400', 'text-blue-400')

                    rtButton.lastElementChild.innerText = parseInt(rtButton.lastElementChild.innerText) + 1

                    e.target.parentNode.parentNode.parentNode.classList.value = e.target.parentNode.parentNode.parentNode.classList.value.replace('block', 'hidden')

                } else {

                    rtButton.classList.value = rtButton.classList.value.replace('text-blue-400', 'hover:text-blue-400')

                    rtButton.lastElementChild.innerText = parseInt(rtButton.lastElementChild.innerText) - 1
                    
                    e.target.parentNode.parentNode.parentNode.classList.value = e.target.parentNode.parentNode.parentNode.classList.value.replace('block', 'hidden')
                }

            } else {

                // pop-up erreur
            }
        }
    })
});