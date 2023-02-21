<?php 

include_once("../models/Model.php");
class UserManager extends Model {

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
}

?>