<?php

class UserManager extends Model
{

    public function __construct()
    {

        $this->logout();
    }

    public function register(string $nickname, string $email, string $password, string $confirmPassword)
    {

        if ($password !== $confirmPassword) {

            return "Les mots de passe ne correspondent pas";
        }

        $this->getDb();
        $data = $this->registerQuery($nickname, $email, $password);

        return $data;
    }

    public function emailCheck(string $email)
    {

        $this->getDb();
        $data = $this->emailCheckQuery($email);

        return $data;
    }

    public function nicknameCheck(string $nickname)
    {

        $this->getDb();
        $data = $this->nicknameCheckQuery($nickname);

        return $data;
    }

    public function login(string $email, string $password)
    {

        $this->getDb();
        $data = $this->loginQuery($email, $password);

        return $data;
    }

    public function sanitize(string $email, string $nickname, string $password, string $confirmPassword)
    {

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

    public function logout()
    {
        if (isset($_POST["logout"])) {
            session_destroy();
            session_start();
            header("Location:index");
        }
    }

    public function nicknameFromId(int $id)
    {

        $this->getDb();
        $data = $this->nicknameFromIdQuery($id, 'User');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    // AT

    public function linkFromAt() {

        session_start();

        $id = $_SESSION["user_id"];

        $this->getDb();
        $data = $this->getAllByIdQuery($id, "User", "users", "id");

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function editUserData($id, $nickname, $email, $password, $newPassword, $avatar = null, $banner = null)
    {

        $nickname = trim($nickname);

        if (!is_int($id) && !is_string($nickname) && !is_string($password) && !is_string($newPassword) && !is_string($avatar)) {

            return "Les données sont incorrectes";
        } else if (preg_match('/^[a-zA-Z0-9_]+$/', $nickname) == false) {

            return "Le nom d'utilisateur ne peut contenir que des lettres, des chiffres ou des underscores";
        } else {

            $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($sanitizedEmail !== $email || $isEmail === false) {

                return "Format de l'adresse mail invalide";
            }
        }

        $this->getDb();
        $data = $this->loginQuery($email, $password);

        if ($data === false) {

            return false;
        } else {

            $data = $this->nicknameCheckQuery($nickname);

            if ($data == false || $data["id"] == $_SESSION["user_id"]) {

                if ($avatar !== null && $banner !== null){

                    $data = explode(",", $_POST["avatar"])[1];

                    $avatar = $this->uploadImg ($data);

                    $data = explode(",", $_POST["banner"])[1];

                    $banner = $this->uploadImg ($data);

                } else if ($avatar !== null) {
                    
                    $data = explode(",", $_POST["avatar"])[1];

                    $avatar = $this->uploadImg ($data);
                } else if ($banner !== null){

                    $data = explode(",", $_POST["banner"])[1];

                    $banner = $this->uploadImg ($data);
                }

                $data = $this->editUserDataQuery($id, $nickname, $email, $avatar, $banner, $password, $newPassword);
                return $data;
            } else {

                return "Pseudonyme déjà utilisé";
            }
        }
    }

    public function uploadImg ($data){

        $data = base64_decode($data);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        anchor:

        $randomString = '';

        for ($i = 0; $i < 2; $i++) {

            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $link = "/var/www/html/img/";

        if (file_exists($link . $randomString)) {

            goto anchor;
        }

        $im = imagecreatefromstring($data);

        if ($im !== false) {

            header('Content-Type: image/png');
            imagepng($im, $link . $randomString);
            imagedestroy($im);

            return $randomString;

        } else {

            echo 'An error occurred.';
        }
    }

    public function getUserById ($id){

        $this->getDb();
        $data = $this->getAllByIdQuery($id, 'User', 'users', "id");

        if ($data) {
            
            return $data;
        } else {
            return false;
        }
    }

    public function getPictureFromId ($id){

        $this->getDb();
        
        $data = $this->getAllByIdQuery($id, 'User', 'users', "id");

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function getFollow ($userid) {

        $this->getDb();
        
        $data = $this->getFollowQuery($userid);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }
}