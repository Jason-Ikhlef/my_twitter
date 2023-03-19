<?php

include_once("User.php");
include_once("Tweet.php");

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

    protected function newTweetQuery(int $user_id, string $message, $images = '')
    {

        if ($images !== ""){

            $images = $this->uploadImg($images);
        }

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

                'SELECT tweets.id, origin, user_id, message, images FROM tweets
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

                'SELECT nickname, picture FROM users
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

    protected function retweetQuery(int $origin, string $message = '', $images = '')
    {

        session_start();

        $user_id = $_SESSION['user_id'];

        if ($message == '') {

            $query = self::$_db->prepare(

                "SELECT * FROM tweets
                WHERE message = :message AND origin = :origin AND user_id = :user_id"

            );

            $query->execute(["origin" => $origin, "user_id" => $user_id, "message" => $message]);

            $result = $query->fetchAll();

            if ($result) {

                $query = self::$_db->prepare(

                    "DELETE FROM tweets
                    WHERE message = :message AND origin = :origin AND user_id = :user_id"
    
                );

                $query->execute(["origin" => $origin, "user_id" => $user_id, "message" => $message]);

                return true;

            }
            
        }

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


    protected function getAllByIdQuery($id, string $obj, string $table, string $column)
    {

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

    protected function newCommentQuery(string $message, $tweet_id, $images = '')
    {

        session_start();

        $user_id = $_SESSION['user_id'];

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

    protected function newLikeQuery(int $tweet_id)
    {

        session_start();

        $user_id = $_SESSION['user_id'];

        try {

            $query = self::$_db->prepare(

                "INSERT INTO likes (user_id, tweet_id)
                VALUES (:user_id, :tweet_id)"

            );

            $query->execute(["user_id" => $user_id, "tweet_id" => $tweet_id]);

            $query = self::$_db->prepare(

                "SELECT user_id FROM likes
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

            $query->execute(["tweet_id" => $tweet_id, "liked_id" => $value[0][0] . $likeId[0][0] . "-"]);

            return true;
        } catch (Exception) {
            return false;
        }
    }

    protected function isLikedQuery($tweet_id)
    {

        $user_id = $_SESSION['user_id'];

        $query = self::$_db->prepare(

            "SELECT id FROM tweets
            WHERE liked_id LIKE :user_id
            AND id = :tweet_id"

        );

        $query->execute(["user_id" => "%-$user_id-%", "tweet_id" => $tweet_id]);
        $data = $query->fetchAll();

        return $data;
    }

    protected function dislikeQuery(int $tweet_id)
    {
        session_start();
        
        $user_id = $_SESSION['user_id'];

        try {

            $query = self::$_db->prepare(

                "DELETE FROM likes
                WHERE user_id = :user_id AND tweet_id = :tweet_id"

            );

            $query->execute(["user_id" => $user_id, "tweet_id" => $tweet_id]);

            $query = self::$_db->prepare(

                "UPDATE tweets
                SET liked_id = REPLACE(liked_id, '-$user_id-', '-')
                WHERE id = :tweet_id"

            );

            $query->execute(["tweet_id" => $tweet_id]);

            return true;
        } catch (Exception) {

            return false;
        }
    }

    protected function countElementsQuery(string $table, string $column, int $id)
    {

        $query = self::$_db->prepare(

            "SELECT COUNT(*) FROM $table
            WHERE $column = :$column"

        );

        $query->execute([$column => $id]);
        $data = $query->fetchAll();

        return $data;
    }

    protected function editUserDataQuery($id, $nickname, $email, $avatar, $banner, $password, $newPassword = null)
    {

        try {

            if ($newPassword != null || $newPassword != "") {

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

            return false;
        }
    }

    protected function htagQuery(string $hashtag, string $obj) {

        $tweets = [];

        try {

            $query = self::$_db->prepare(

                "SELECT * FROM tweets
                WHERE message LIKE :message"

            );

            $query->execute(['message' => "%$hashtag%"]);

            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {

                $tweets[] = new $obj($data);
            }

            $query->closeCursor();
            return $tweets;
        } catch (Exception) {

            return false;
        }
     }  

    protected function getFollowQuery($userid)
    {

        $query = self::$_db->prepare(

            "SELECT follows FROM users 
            WHERE id = :id"

        );

        $query->execute(["id" => $userid]);
        $follow = $query->fetch();

        $follow = explode("-", $follow[0]);

        array_shift($follow);

        return $follow;
    }

    protected function setFollowQuery ($followId, $currentUser) {

        $followList = $this->getFollowQuery($currentUser);

        if (!in_array($followId, $followList)) {
            
            array_push($followList, $followId);
            $followList = array_diff($followList, array("", "-"));
        } else {
            
            $followList = array_diff($followList, array($followId, ""));
        }
        
        $followList = implode("-", $followList);

        if (strlen($followList) >= 1){

            $followList = $followList . "-";
        }

        $followList = "-" . $followList;
        
        $query = self::$_db->prepare(

            "UPDATE users SET follows = :follows
            WHERE id = :id"

        );

        $query->execute(["id" => $currentUser, "follows" => $followList]);

        return true;
    }

    protected function getFollowInfoQuery ($currentUser, $checkID, $count) {

        $followList = $this->getFollowQuery($currentUser);

        if (in_array($checkID, $followList)) {

            $isFollow = true;
        } else {

            $isFollow = false;
        }

        if (strlen($count) == 1){
                
            $follows = 0;
        } else {
        
            $follows = explode("-", $count);

            
            $follows = array_unique($follows);
            
            array_shift($follows);
        
            $follows = count($follows);
        }
        
        return [$isFollow, $follows];
    }

    protected function getFollowersQuery ($id) {

        $query = self::$_db->prepare(

            "SELECT COUNT(*) FROM users
            WHERE follows LIKE :id"

        );

        
        $query->execute(["id" => "%-" . $id . "-%"]);

        $data = $query->fetch();

        return $data;
    }


    protected function isRetweetedQuery($origin, $message = '')
    {
    
        $user_id = $_SESSION['user_id'];

        $query = self::$_db->prepare(

            "SELECT * FROM tweets
            WHERE message = :message AND origin = :origin AND user_id = :user_id"

        );

        $query->execute(["origin" => $origin, "user_id" => $user_id, "message" => $message]);

        $result = $query->fetchAll();

        return $result;
    } 

    protected function getTweetsCountQuery ($id) {

        $query = self::$_db->prepare(

            "SELECT COUNT(*) FROM tweets
            WHERE user_id = :id"

        );

        $query->execute(["id" => $id]);
        
        $data = $query->fetch();

        return $data;
    }
}
