<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;

echo $controller->quoteTweet($_POST['tweet_id'], explode("=", $_POST['form'])[1]);