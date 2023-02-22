<?php

session_start();

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

if (!empty($_POST["email"] && !empty($_POST["password"]))){
    
    $controller = new UserManager;
    $data = $controller->login($_POST["email"], $_POST["password"]);
    
    if (empty($data)){
        echo "Identifiants incorrects";
    } else {
        $_SESSION["user_id"] = $data["id"];
        echo true;
    }
} else {
    echo "Tous les champs avec une étoile sont requis";
}
