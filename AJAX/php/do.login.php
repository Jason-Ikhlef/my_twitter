<?php

session_start();

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");

if (!empty($_POST["email"] && !empty($_POST["password"]))) {

    $controller = new UserManager;
    $data = $controller->login($_POST["email"], $_POST["password"]);

    if (empty($data)) {
        echo "Identifiants incorrects";
    } else {        
        
        if (strlen($data["follows"]) == 1){
            
            $data["follows"] = 0;
        } else {

            $data["follows"] = explode("-", $data["follows"]);

            array_shift($data["follows"]);

            $data["follows"] = count($data["follows"]);
        }
        

        var_dump($data["follows"]); 


        $_SESSION["user_id"] = $data["id"];
        $_SESSION["user_data"] = array("id" => $data["id"], "nickname" => $data["nickname"], "email" => $data["email"], "follows" => $data["follows"], "picture" => $data["picture"], "banner" => $data["banner"], "date" => $data["date"]);
        echo true;
    }
} else {
    echo "Tous les champs avec une étoile sont requis";
}
