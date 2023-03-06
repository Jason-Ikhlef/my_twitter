<?php

abstract class Model
{

    private static $_db;

    private static function setDb()
    {

        self::$_db = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8;', 'dorian1', '123');

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

    protected function idUserFromOriginQuery(int $origin_id, string $obj)
    {

        $nickname = [];

        try {

            $query = self::$_db->prepare(

                'SELECT user_id FROM tweets
                WHERE id = :origin'

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

                "SELECT id, nickname, email, follows, picture, date FROM users WHERE email = :email AND password = :password"

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

    protected function newLikeQuery($tweet_id) {

        session_start();

        $user_id = $_SESSION['user_id'];

        try {

            $query = self::$_db->prepare(
    
                "INSERT INTO likes (user_id, tweet_id)
                VALUES (:user_id, :tweet_id)"
    
            );
    
            $query->execute(["user_id" => $user_id, "tweet_id" => $tweet_id]);

            $query = self::$_db->prepare(
    
                "SELECT id FROM likes
                WHERE user_id = :user_id AND tweet_id = :tweet_id"
            );
    
            $query->execute(["user_id" => $user_id, "tweet_id" => $tweet_id]);

            $likeId = $query->fetchAll();

            $query = self::$_db->prepare(
    
                "SELECT liked_id FROM tweets
                WHERE id = :tweet_id"
            );
    
            $query->execute(["tweet_id" => $tweet_id]);

            $value = $query->fetchAll();
            
            $query = self::$_db->prepare(
    
                "UPDATE tweets
                SET liked_id = :liked_id
                WHERE id = :tweet_id"
    
            );
    
            $query->execute(["tweet_id" => $tweet_id, "liked_id" => $value[0][0].$likeId[0][0]."-"]);

            return true;
    
        } catch (Exception) {
            return false;
        }
    }

    protected function isLiked() {

        
    }
}