<?php

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

session_start();

var_dump($_POST["password"]);
var_dump ($_POST["newPassword"]);

$controller = new UserManager;
$data = $controller->editUserData($_SESSION["user_data"][0], $_POST["nickname"], $_POST["email"], $_POST["avatar"], $_POST["password"], $_POST["newPassword"]);

if ($data === false){
    echo "Mot de passe incorrect";
} else {
    echo "Changements effectués";
}

?>