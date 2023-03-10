<?php

include_once ("../../models/Model.php");
include_once ("../../controllers/UserManager.php");

session_start();

if (isset($_POST["avatar"])){

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_data"][0], $_POST["nickname"], $_POST["email"], $_POST["password"], $_POST["newPassword"], $_POST["avatar"]);
} else {

    $controller = new UserManager;
    $data = $controller->editUserData($_SESSION["user_data"][0], $_POST["nickname"], $_POST["email"], $_POST["password"], $_POST["newPassword"]);
}


if ($data === false){

    echo "Mot de passe incorrect";
} else if ($data === "Pseudonyme déjà utilisé") {

    echo $data;
} else {

    var_dump($data);
    echo "Changements effectués";
}

// if (!isset($_POST["avatar"])){

//     var_dump($_POST);
// } else {

//     echo $_POST["str"];
//     echo $_POST["avatar"];
// }
