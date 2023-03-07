<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;


echo $controller->dislike(explode("-", ($_POST['ids']))[0]);