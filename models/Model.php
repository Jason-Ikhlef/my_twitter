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

            $password = hash('ripemd160', $password);

            $req = self::$_db->prepare(

                "INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)"

            );
            
            $req->execute(["nickname" => $nickname, "email" => $email, "password" => $password]);

            return true;
        } catch (Exception) {

            return false;
        }
    }

    protected function newTweetQuery(string $message, int $user_id = 1, $images = '') {

        try {

        $query = self::$_db->prepare(

            "INSERT INTO tweets (user_id, message, images)
            VALUES (:user_id, :message, :images)"

        );

        $query->execute(["user_id" => $user_id, "message" => $message, "images" => $images]);

        return true;

        } catch (Exception) {
            
            return false;
        }
    }

    protected function getLastTweetsQuery(string $obj) {

        $tweets = [];

        try {

            $query = self::$_db->prepare(

                'SELECT tweets.id, origin, user_id, message FROM tweets
                ORDER BY date DESC
                LIMIT 50'
            );

            $query->execute();

            while($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweets[] = new $obj($data);
            }

            $query->closeCursor();
            return $tweets;
            
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
            
    protected function nicknameFromIdQuery(int $id, string $obj) {

        $nickname = [];

        try {

            $query = self::$_db->prepare(

                'SELECT nickname FROM users
                WHERE id = :id'

            );

            $query->execute(["id" => $id]);

            while($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $nickname[] = new $obj($data);
            }

            $query->closeCursor();
            return $nickname;
            
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

    protected function idUserFromOriginQuery(int $origin_id, string $obj) {

        $nickname = [];

        try {

            $query = self::$_db->prepare(

                'SELECT user_id FROM tweets
                WHERE origin = :origin'

            );

            $query->execute(["origin" => $origin_id]);

            while($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $nickname[] = new $obj($data);
            }

            $query->closeCursor();
            return $nickname;
            
        } catch (Exception) {

            return false;
        }
    }

    protected function loginQuery ($email, $password){

        try {

            $password = hash('ripemd160', $password);

            $req = self::$_db->prepare(

                "SELECT * FROM users WHERE email = :email AND password = :password"

            );

            $req->execute(["email" => $email, "password" => $password]);
            $req = $req->fetch();

            if (empty($req)) {
                return false;
            } else {
                return $req;
            }

        } catch (Exception) {
        
        return false;
        
        }
    }
    
    protected function retweetQuery(int $tweet_id) {

        session_start();

        try {

            // $id_user = $_SESSION['user_id'];
            $user_id = 1;

            $query = self::$_db->prepare(

                "INSERT INTO retweets (tweet_id, user_id)
                VALUES ($tweet_id, $user_id)"

            );

            $query->execute();

            return true;
            
        } catch (Exception) {

            return false;
        }
    }

    protected function quoteTweetQuery(int $origin, string $message, int $user_id = 1, $images = '') {

        try {

        $query = self::$_db->prepare(

            "INSERT INTO tweets (origin, user_id, message, images)
            VALUES (:origin, :user_id, :message, :images)"

        );

        $query->execute(["origin" => $origin, "user_id" => $user_id, "message" => $message, "images" => $images]);

        return true;

        } catch (Exception) {
            
            return false;
        }
    }

    protected function getAllByIdQuery(int $id, string $obj) {

        $tweet = [];

        try {

            $query = self::$_db->prepare(

                "SELECT * FROM tweets
                WHERE id = :id"

            );

            $query->execute(["id" => $id]);

            while($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweet[] = new $obj($data);
            }

            $query->closeCursor();
            return $tweet;

            } catch (Exception) {
                
                return false;
            }
    }
}