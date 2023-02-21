<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;
$tweetContent = $_POST['newTweet'];

echo $controller->newTweet($tweetContent);