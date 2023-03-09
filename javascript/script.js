$(document).ready(function () {
    //Log in popup display

    $(".logInButton").on("click", function () {
        $("#loginOverlay").removeClass("hidden");
        $("#loginOverlay").addClass("block");
    });

    $(".logInClose").on("click", function () {
        $("#loginOverlay").removeClass("block");
        $("#loginOverlay").addClass("hidden");
    });

    $(".logInSwitchButton").on("click", function () {
        $("#loginOverlay").removeClass("block");
        $("#loginOverlay").addClass("hidden");

        $("#signInOverlay").removeClass("hidden");
        $("#signInOverlay").addClass("block");
    });

    //Sign in popup display

    $(".signInButton").on("click", function () {
        $("#signInOverlay").removeClass("hidden");
        $("#signInOverlay").addClass("block");
    });

    $(".signInClose").on("click", function () {
        $("#signInOverlay").removeClass("block");
        $("#signInOverlay").addClass("hidden");
    });

    $(".signInSwitchButton").on("click", function () {
        $("#signInOverlay").removeClass("block");
        $("#signInOverlay").addClass("hidden");

        $("#loginOverlay").removeClass("hidden");
        $("#loginOverlay").addClass("block");
    });

    //Retweet popup display

    $(".retweetButton").on("click", function () {
        if ($("#retweetOverlay").hasClass("block")) {
            $("#retweetOverlay").removeClass("block");
            $("#retweetOverlay").addClass("hidden");
        } else {
            $("#retweetOverlay").removeClass("hidden");
            $("#retweetOverlay").addClass("block");
        }
    });

    $("body").on("keyup", function (e) {
        if (e.code == "Escape") {
            $("#retweetOverlay").removeClass("block");
            $("#retweetOverlay").addClass("hidden");
        }
    });

    //Edit profil popup

    $(".editButton").on("click", function () {
        $("#editOverlay").removeClass("hidden");
        $("#editOverlay").addClass("block");
    });

    $(".editClose").on("click", function () {
        $("#editOverlay").removeClass("block");
        $("#editOverlay").addClass("hidden");
    });
});
