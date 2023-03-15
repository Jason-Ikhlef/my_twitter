<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;

echo $controller->newComment($_POST['form'], $_POST['tweet_id']);