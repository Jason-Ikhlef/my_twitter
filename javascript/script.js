$( document ).ready(function() {

//Log in popup display

$(".button").on("click", function() {
    $("#loginOverlay").removeClass("hidden");
    $("#loginOverlay").addClass("block");
});

$(".close").on("click", function() {
    $("#loginOverlay").removeClass("block");
    $("#loginOverlay").addClass("hidden");
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