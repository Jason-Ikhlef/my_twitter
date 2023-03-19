<?php 

require_once('./views/View.php');

class ControllerTweet
{
    private $_view;
    private $_tweetManager;
    private $_userManager;

    public function __construct($url) {

        if (!is_array($url)) {
            $this->viewTweet();
            return;
        }

        if (isset($url) && count(array($url)[0]) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->viewTweet();
        }
    }

    private function viewTweet() {

        if (isset($_POST['seeComments'])) {
            
            session_start();

            if (isset($_SESSION["profil_id"])){

                unset($_SESSION["profil_id"]);
            }
            
            $this->_tweetManager = new TweetManager;
            $comments = $this->_tweetManager->getComments();
            
            $this->_view = new View('Tweet');
            $this->_view->generate(['comments' => $comments]);

        } else {

            session_start();
            
            header('Location:index');

        }
    }
}