<?php 

class UserManager extends Model {

    public function __construct(){

        $this->logout();
    }

    public function register (string $nickname, string $email, string $password, string $confirmPassword){
    
        if ($password !== $confirmPassword) {

            return "Les mots de passe ne correspondent pas";
        }
        
        $this->getDb();
        $data = $this->registerQuery($nickname, $email, $password);

        return $data;
    }

    public function emailCheck (string $email){

        $this->getDb();
        $data = $this->emailCheckQuery($email);

        return $data;
    }

    public function nicknameCheck (string $nickname) {

        $this->getDb();
        $data = $this->nicknameCheckQuery($nickname);

        return $data;
    }

    public function login (string $email, string $password){

        $this->getDb();
        $data = $this->loginQuery($email, $password);

        return $data;
    }

    public function sanitize (string $email, string $nickname, string $password, string $confirmPassword) {

        if ($password !== $confirmPassword) {

            return "Les mots de passe ne correspondent pas";
        }

        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        if ($sanitizedEmail !== $email) {

            return "Format de l'adresse mail invalide";
        } else if ($isEmail === false) {

            return "Format de l'adresse mail invalide";
        } else if (preg_match('/^[a-zA-Z0-9_]+$/', $nickname) == false) {

            return "Le nom d'utilisateur ne peut contenir que des lettres, des chiffres ou des underscores";
        } else {

            return true;
        }
    }

    public function logout () {
        if (isset($_POST["logout"])){
            session_destroy();
            session_start();
            header("Location:index");
        }
    }
    
    public function nicknameFromId(int $id) {

        $this->getDb();
        $data = $this->nicknameFromIdQuery($id, 'User');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }
}


?>