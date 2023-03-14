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
        $_SESSION["user_data"] = array($data["id"], $data["nickname"], $data["email"], $data["follows"], $data["picture"], $data["banner"], $data["date"]);
        echo true;
    }
} else {
    echo "Tous les champs avec une étoile sont requis";
}
