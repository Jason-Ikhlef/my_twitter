<?php

session_start();

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");

$controller = new UserManager;
$data = $controller->follow($_POST["follow"], $_SESSION["user_id"]);

var_dump($data);

$_SESSION["follow"] = count($data[0]);

?>