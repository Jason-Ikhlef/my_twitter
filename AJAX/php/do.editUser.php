<?php

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

session_start();

if (isset($_POST["password"]) && $_POST["password"] == "" || isset($_POST["str"]["password"]) && $_POST["str"]["password"] == ""){

    echo "Mot de passe requis";
    return;
}

if (isset($_POST["newPassword"]) && $_POST["newPassword"] !== ""){

    $tmpPassword = $_POST["newPassword"];
} else if (isset($_POST["str"]["newPassword"]) && $_POST["str"]["newPassword"] !== ""){

    $tmpPassword = $_POST["str"]["newPassword"];
} else {

    if (isset($_POST["password"]) && $_POST["password"] !== ""){

        $tmpPassword = $_POST["password"];
    } else {

        $tmpPassword = $_POST["str"]["password"];
    }
}

if (isset($_POST["str"]["email"])) {

    $tmpEmail = $_POST["str"]["email"];
} else {

    $tmpEmail = $_POST["email"];
}

if (isset($_POST["avatar"]) && isset($_POST["banner"])){

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_id"], $_POST["str"]["nickname"], $_POST["str"]["email"], $_POST["str"]["password"], $_POST["str"]["newPassword"], $_POST["avatar"], $_POST["banner"]);

} else if (isset($_POST["avatar"])){

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_id"], $_POST["str"]["nickname"], $_POST["str"]["email"], $_POST["str"]["password"], $_POST["str"]["newPassword"], $_POST["avatar"], null);

} else if (isset($_POST["banner"])) {

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_id"], $_POST["str"]["nickname"], $_POST["str"]["email"], $_POST["str"]["password"], $_POST["str"]["newPassword"], null, $_POST["banner"]);
} else {

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_id"], $_POST["nickname"], $_POST["email"], $_POST["password"], $_POST["newPassword"], null, null);
}


if ($data === false){

    echo "Mot de passe incorrect";
} else if ($data === "Pseudonyme déjà utilisé") {

    echo $data;
} else {

    $data = $controller->login($tmpEmail, $tmpPassword);
    $_SESSION["user_data"] = array($data["id"], $data["nickname"], $data["email"], $data["follows"], $data["picture"], $data["banner"], $data["date"]);

    echo "Changements effectués";
}