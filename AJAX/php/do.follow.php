<?php

session_start();

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");


// $post follow dispo

$controller = new UserManager;
$data = $controller->getFollow($_SESSION["user_id"]);

var_dump($data);

$_SESSION["follow"] = count($data);

var_dump($_SESSION["follow"])

?>