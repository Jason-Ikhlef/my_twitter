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
}