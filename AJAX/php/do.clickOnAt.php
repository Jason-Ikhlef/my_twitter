<?php

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");

session_start();

$controller = new UserManager;
$data = $controller->nicknameCheck($_GET["nickname"]);

$_SESSION["profil_id"] = $data["id"];