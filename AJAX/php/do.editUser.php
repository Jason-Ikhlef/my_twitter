<?php

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

session_start();

if (isset($_POST["password"]) && $_POST["password"] == "" || isset($_POST["str"]["password"]) && $_POST["str"]["password"] == ""){

    echo "Mot de passe requis";
    return;
}

if (isset($_POST["avatar"])){

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_data"][0], $_POST["str"]["nickname"], $_POST["str"]["email"], $_POST["str"]["password"], $_POST["str"]["newPassword"], $_POST["avatar"]);
} else {

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_data"][0], $_POST["nickname"], $_POST["email"], $_POST["password"], $_POST["newPassword"]);
}


if ($data === false){

    echo "Mot de passe incorrect";
} else if ($data === "Pseudonyme déjà utilisé") {

    echo $data;
} else {

    echo "Changements effectués";
}
