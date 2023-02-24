<?php

require_once('views/View.php');

class ControllerProfil
{
    private $_view;
    private $_userManager;


    public function __construct($url)
    {
        if (is_array($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            if ($url[0] === "Profil" || $url[0] === "profil") {
                $this->profil();
            }
        }
    }

    private function profil()
    {
        session_start();
        if (isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])) {

            $this->_view = new View('Profil');
            $this->_view->generate(array("" => ""));
        } else {

            $this->_view = new View('Index');
            $this->_view->generate(array("" => ""));
        }
    }
}
