<?php
abstract class Model {

    private static $_db;

    private static function setDb() {

        self::$_db = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8;', 'root', 'AJR2042ci6');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDb() {

        if (self::$_db == null) {
            self::setDb();
            return self::$_db;
        }
    }

    protected function registerQuery (string $nickname, string $email, string $password){

        try {

            $req = self::$_db->prepare(

                "INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)"

            );
            
            $req->execute(["nickname" => $nickname, "email" => $email, "password" => $password]);

            return true;

        } catch (Exception) {

            return false;
        }
    }

    protected function emailCheckQuery ($email) {

        try {
        
            $req = self::$_db->prepare(
                
                "SELECT email FROM users WHERE email = :email"
                
            );
            
            $req->execute(["email" => $email]);
            $req = $req->fetch();
            
            if (empty($req)) {
                return false;
            } else {
                return true;
            }

        } catch (Exception) {

            return false;
        }
    }

    protected function nicknameCheckQuery ($nickname) {

        try {
                
            $req = self::$_db->prepare(

                "SELECT nickname FROM users WHERE nickname = :nickname"

            );

            $req->execute(["nickname" => $nickname]);
            $req = $req->fetch();

            if (empty($req)) {
                return false;
            } else {
                return true;
            }

        } catch (Exception) {
            return false;
        }
    }
}