$(".ConfirmNewTweet").on("click", function (e) {
    e.preventDefault();

    const message = $('#tweetMessage').text().trim()

    const imgFile = document.getElementById("imgInTweet").files[0];

    if (imgFile !== undefined) {

        let fileType = imgFile["type"];
        let validImageTypes = ["image/jpeg", "image/png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            console.log("Le fichier joint n'est pas de type jpeg ou png");
            return;
        }

        let firstReader = new FileReader();

        firstReader.readAsDataURL(imgFile);
        firstReader.addEventListener("load", () => {
            imgData = firstReader.result;

            data = { message: message, image: imgData }

            myAjaxFunc(data)
        })

    } else {
        
        data = { message: message }

        myAjaxFunc(data)
    }
})

function myAjaxFunc(data) {

    $.ajax({
        type: "POST",
        data: data,
        url: "./AJAX/php/do.newTweet.php",
        success: function(data) {
            if (data != 'Message trop long' && data != 'Tweet vide') {

                window.location.replace('/twitter/index')

            } else {

                // pop-up erreur
                alert(data);
            }
        }
    })
}