<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;

echo $controller->newComment(explode("=", $_POST['form'])[1], $_POST['tweet_id']);