<?php 

class View {

    private $_file;
    private $_t;

    public function __construct($action) {

        $this->_file = 'views/view' . $action . '.php';
    }

    public function generate($data, $template = '') {

        $content = $this->generateFile($this->_file, $data);

        if ($template == 'Profil') {
            $view = $this->generateFile('views/templates/templateProfil.php', array('t' => $this->_t, "content" => $content));
        } else {
            if(isset($_SESSION["user_id"]) && !isset($_POST["disconnect"])){
                $view = $this->generateFile('views/templates/templateLoggedIn.php', array('t' => $this->_t, "content" => $content));
            }
            else {
                $view = $this->generateFile('views/templates/template.php', array('t' => $this->_t, "content" => $content));
            }
        }

        echo $view;
    }

    private function generateFile($file, $data) {

        if (file_exists($file)) {

            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception('Fichier ' . $file . ' introuvable');
        }
    }

}