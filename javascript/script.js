$( document ).ready(function() {
$(".button").on("click", function() {
    $("#overlay").css("display", "block");
});

$(".close").on("click", function() {
    $("#overlay").css("display", "none");
});
})