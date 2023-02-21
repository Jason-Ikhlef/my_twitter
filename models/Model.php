<?php
abstract class Model
{

    private static $_db;

    private static function setDb()
    {

        self::$_db = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8;', 'root', 'AJR2042ci6');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDb()
    {

        if (self::$_db == null) {
            self::setDb();
            return self::$_db;
        }
    }

    protected function registerQuery (string $nickname, string $email, string $password){

        $req = $this->getDb()->prepare(

            "INSERT INTO user (nickname, email, password) VALUES (:nickname, :email, :password)"

        );
        
        $req->execute(["nickname" => $nickname, "email" => $email, "password" => $password]);

        return true;
    }

    protected function emailCheckQuery ($email)
     {
        $req = $this->getDb()->prepare(
            
            "SELECT * FROM user WHERE email = :email"
        
        );
            $req->execute(["email" => $email]);
            $req = $req->fetch();

        if (empty($req)) {
            return true;
        } else {
            return false;
        }
     }
}