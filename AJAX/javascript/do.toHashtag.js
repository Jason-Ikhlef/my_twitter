// $(".toHashtag").on("click", function(e) {
//     e.preventDefault();

//     $.ajax({
//         type: "POST",
//         data: {hashtag : e.target.value},
//         url: "./AJAX/php/do.comment.php",
//         success: function(data) {
            
//             if (data == 1) {

//                 window.location.replace('/twitter/hashtag')
                
//             } else {

//                 // pop-up erreur
//             }
//         }
//     })
// });