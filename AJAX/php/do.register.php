<?php

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

if (!empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["registerPassword"]) && !empty($_POST["registerConfirmPassword"])) {

    $controller = new UserManager;

    $sanitized = $controller->sanitize($_POST["email"], $_POST["nickname"], $_POST["registerPassword"], $_POST["registerConfirmPassword"]);

    if ($sanitized !== true) {

        echo $sanitized;
        return;
    }

    $emailDuplicate = $controller->emailCheck($_POST["email"]);
    $nicknameDuplicate = $controller->nicknameCheck($_POST["nickname"]);

    if ($emailDuplicate == true){

        echo "Adresse email déjà utilisée";
        return;
    } else if ($nicknameDuplicate == true){

        echo "Nom d'utilisateur déjà utilisé";
        return;
    } else {

        $controller = $controller->register($_POST["nickname"], $_POST["email"], $_POST["registerPassword"], $_POST["registerConfirmPassword"]);
    }

} else {
    echo "Tous les champs avec une étoile sont requis";
}