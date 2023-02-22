<?php 

class Router {

    private $_ctrl;
    private $_view;

    public function routeReq() {

        try {
            spl_autoload_register(function ($class) {
                
                if (file_exists('models/' . $class . '.php')) {
                    require_once('models/' . $class . '.php');
                }

                if (file_exists('controllers/' . $class . '.php')) {
                    require_once('controllers/' . $class . '.php');
                }
            });

            $url = '';

            if (isset($_GET['url'])) {

                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = 'Controller' . $controller;

                $controllerFile = "controllers/" . $controllerClass . '.php';

                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                } else {
                    throw new Exception('Page introuvable');
                }
            } else {
                require_once('controllers/ControllerIndex.php');
                $this->_ctrl = new ControllerIndex($url);
            }
        } 
        
        catch (Exception $e) {
            $errorMsg = $e->getMessage();
            require_once('views/viewError.php');
        }
    }
}