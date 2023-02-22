$( document ).ready(function() {
$(".button").on("click", function() {
    $('#loginOverlay').removeClass('hidden');
    $("#loginOverlay").addClass('block');
});

$(".close").on("click", function() {
    $('#loginOverlay').removeClass('block');
    $("#loginOverlay").addClass('hidden');
});
})