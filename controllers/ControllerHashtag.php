<?php 

require_once('./views/View.php');

class ControllerHashtag
{
    private $_view;
    private $_tweetManager;
    public function __construct($url) {

        if (!is_array($url)) {
            $this->viewHashTag();
            return;
        }

        if (isset($url) && count(array($url)[0]) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->viewHashTag();
        }
    }

    private function viewHashTag() {

        session_start();

        if (isset($_SESSION["profil_id"])){

            unset($_SESSION["profil_id"]);
        }

        $this->_tweetManager = new TweetManager;
        $tweets = $this->_tweetManager->htag("#" . explode("=", $_SERVER['REQUEST_URI'])[1]);

        $this->_view = new View('Hashtag');
        $this->_view->generate(["tweets" => $tweets]);
    }
}