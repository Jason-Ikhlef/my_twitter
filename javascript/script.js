$( document ).ready(function() {

//Log in popup display

$(".button").on("click", function() {
    $("#overlay").css("display", "block");
});

$(".close").on("click", function() {
    $("#overlay").css("display", "none");
});

//Sign in popup display

$(".signInButton").on("click", function() {
    $("#signInOverlay").removeClass("hidden");
    $("#signInOverlay").addClass("block");
});

$(".signInClose").on("click", function() {
    $("#signInOverlay").removeClass("block");
    $("#signInOverlay").addClass("hidden");
});
})