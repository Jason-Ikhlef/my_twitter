<?php 

require_once('./views/View.php');

class ControllerIndex
{
    private $_view;
    private $_tweetManager;

    public function __construct($url) {

        if (!is_array($url)) {
            $this->baseIndex();
            return;
        }

        if (isset($url) && count(array($url)[0]) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->baseIndex();
        }
    }

    private function baseIndex() {

        session_start();

        if (isset($_SESSION["profil_id"])){

            unset($_SESSION["profil_id"]);
        }
        
        $this->_tweetManager = new TweetManager;
        $tweets = $this->_tweetManager->getLastTweets();

        $this->_view = new View('Index');
        $this->_view->generate(['tweets' => $tweets]);
    }
}