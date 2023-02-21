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

                'SELECT tweets.id, user_id, message FROM tweets
                ORDER BY date DESC
                LIMIT 10'
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

    function nicknameFromIdQuery(int $id, string $obj) {

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
}