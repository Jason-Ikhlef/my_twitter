<?php 

include_once('../../models/Model.php');
include_once('../../controllers/TweetManager.php');

$controller = new TweetManager;
$tweetContent = $_POST['message'];

session_start();

$user_id = $_SESSION['user_id'];

if ($controller->newTweet($user_id, $tweetContent, $_POST["image"]) == $tweetContent) {
    echo $tweetContent;
} else {
    echo $controller->newTweet($user_id, $tweetContent, $_POST["image"]);
}