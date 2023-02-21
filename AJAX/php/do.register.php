<?php

include_once ("../models/Model.php");
include_once ("../models/UserManager.php");

if (!empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["registerPassword"]) && !empty($_POST["registerConfirmPassword"])) {

    $controller = new UserManager;
    $data = $controller->emailCheck($_POST["email"]);

    if ($data == false){

        echo "Adresse email déjà utilisée";
        return;
    } else {

        $controller = $controller->register($_POST["nickname"], $_POST["email"], $_POST["registerPassword"], $_POST["registerConfirmPassword"]);
    }

} else {
    echo "Tous les champs avec une étoile sont requis";
}