<?php

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");

session_start();

$_SESSION["profil_id"] = $_GET["user_id"];

$controller = new UserManager;
$data = $controller->nicknameFromId($_GET["user_id"]);

echo $data[0]->nickname();

?>