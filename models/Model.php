<?php

abstract class Model
{

    private static $_db;

    private static function setDb()
    {

        self::$_db = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8;', 'root', 'root');

        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDb()
    {

        if (self::$_db == null) {
            self::setDb();
            return self::$_db;
        }
    }


    protected function registerQuery(string $nickname, string $email, string $password)
    {

        try {

            $password = hash('ripemd160', $password . "vive le projet tweet_academy");

            $req = self::$_db->prepare(

                "INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)"

            );

            $req->execute(["nickname" => $nickname, "email" => $email, "password" => $password]);

            return true;
        } catch (Exception) {

            return false;
        }
    }

    protected function newTweetQuery(string $message, $images = '') {

        session_start();

        $user_id = $_SESSION['user_id'];
        // $user_id = 2;

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

    protected function getLastTweetsQuery(string $obj)
    {

        $tweets = [];

        try {

            $query = self::$_db->prepare(

                'SELECT tweets.id, origin, user_id, message FROM tweets
                WHERE comments IS NULL
                ORDER BY date DESC
                LIMIT 50'
            );

            $query->execute();

            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweets[] = new $obj($data);
            }

            $query->closeCursor();
            return $tweets;
        } catch (Exception) {

            return false;
        }
    }


    protected function emailCheckQuery($email)
    {

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

    protected function nicknameFromIdQuery(int $id, string $obj)
    {

        $nickname = [];

        try {

            $query = self::$_db->prepare(

                'SELECT nickname FROM users
                WHERE id = :id'

            );

            $query->execute(["id" => $id]);

            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $nickname[] = new $obj($data);
            }

            $query->closeCursor();
            return $nickname;
        } catch (Exception) {

            return false;
        }
    }


    protected function nicknameCheckQuery($nickname)
    {

        try {

            $req = self::$_db->prepare(

                "SELECT nickname, id FROM users WHERE nickname = :nickname"
            );

            $req->execute(["nickname" => $nickname]);
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

    protected function idUserFromOriginQuery(int $origin_id, string $obj)
    {

        $nickname = [];

        try {

            $query = self::$_db->prepare(

                'SELECT user_id FROM tweets
                WHERE origin = :origin'

            );

            $query->execute(["origin" => $origin_id]);

            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $nickname[] = new $obj($data);
            }

            $query->closeCursor();
            return $nickname;
        } catch (Exception) {

            return false;
        }
    }

    protected function loginQuery($email, $password)
    {

        try {

            $password = hash('ripemd160', $password . "vive le projet tweet_academy");

            $req = self::$_db->prepare(

                "SELECT id, nickname, email, follows, picture, banner, date FROM users WHERE email = :email AND password = :password"

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

    protected function retweetQuery(int $tweet_id)
    {

        session_start();

        try {

            $user_id = $_SESSION['user_id'];
            // $user_id = 2;

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

    protected function quoteTweetQuery(int $origin, string $message, $images = '') {

        session_start();

        $user_id = $_SESSION['user_id'];
        // $user_id = 2;

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


    protected function getAllByIdQuery(int $id, string $obj, string $table, string $column) {

        $tweet = [];

        try {

            $query = self::$_db->prepare(

                "SELECT * FROM $table
                WHERE $column = :$column"

            );

            $query->execute([$column => $id]);

            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweet[] = new $obj($data);
            }

            $query->closeCursor();
            return $tweet;


        } catch (Exception) {
            
            return false;
        }
    }

    protected function newCommentQuery(string $message, $tweet_id, $images = '') {

        session_start();

        $user_id = $_SESSION['user_id'];
        // $user_id = 1;

        try {

            $query = self::$_db->prepare(
    
                "INSERT INTO tweets (user_id, message, images, comments)
                VALUES (:user_id, :message, :images, :comment)"
    
            );
    
            $query->execute(["user_id" => $user_id, "message" => $message, "images" => $images, "comment" => $tweet_id]);
    
            return true;
    
        } catch (Exception) {
            return false;
        }
    }

    protected function editUserDataQuery ($id, $nickname, $email, $avatar, $banner, $password, $newPassword = null) {

        try {
            
            if ($newPassword != null || $newPassword != ""){

                $password = hash('ripemd160', $newPassword . "vive le projet tweet_academy");  
            } else {
                
                $password = hash('ripemd160', $password . "vive le projet tweet_academy");
            }

            if ($avatar !== null && $banner !== null) {

                $req = "UPDATE users SET nickname = :nickname, email = :email, picture = :avatar, banner = :banner, password = :password WHERE id = :id";

                $exec = ["nickname" => $nickname, "email" => $email, "avatar" => $avatar, "password" => $password, "banner" => $banner, "id" => $id];

            } else if ($avatar !== null) {
                
                $req = "UPDATE users SET nickname = :nickname, email = :email, picture = :avatar, password = :password WHERE id = :id";

                $exec = ["nickname" => $nickname, "email" => $email, "avatar" => $avatar, "password" => $password, "id" => $id];

            } else if ($banner !== null) {

                $req = "UPDATE users SET nickname = :nickname, email = :email, banner = :banner, password = :password WHERE id = :id";

                $exec = ["nickname" => $nickname, "email" => $email, "banner" => $banner, "password" => $password, "id" => $id];
            } else {

                $req = "UPDATE users SET nickname = :nickname, email = :email, password = :password WHERE id = :id";

                $exec = ["nickname" => $nickname, "email" => $email, "password" => $password, "id" => $id];
            }

            $query = self::$_db->prepare(

                $req

            );

            

            $query->execute($exec);

            return true;
            
        } catch (Exception) {

            return "Echec de la modification";
        }
    }
}
