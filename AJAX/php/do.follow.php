<?php

session_start();

include_once("../../models/Model.php");
include_once("../../controllers/UserManager.php");

$controller = new UserManager;
$data = $controller->setFollow($_POST["follow"], $_SESSION["user_id"]);

?>