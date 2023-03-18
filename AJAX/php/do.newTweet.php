<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;
$tweetContent = $_POST['message'];

if ($controller->newTweet($tweetContent, $_POST["image"]) == $tweetContent) {
    echo $tweetContent;
} else {
    echo $controller->newTweet($tweetContent, $_POST["image"]);
}