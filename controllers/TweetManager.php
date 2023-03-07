<?php 

class TweetManager extends Model {

    // Tweet table Functions Here ...

    public function newTweet($message, $images = '') {

        if (empty($message)) {

            return 'Tweet vide';
        } else if (strlen($message) > 140) {
            
            return 'Message trop long';
        }

        $this->getDb();
        $data = $this->newTweetQuery($message, $images);

        if ($data) {

            return $message;
        } else {
            
            return false;
        }
    }

    public function getLastTweets() {

        $this->getDb();
        $data = $this->getLastTweetsQuery('Tweet');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function retweet($tweet_id) {

        $this->getDb();
        $data = $this->retweetQuery($tweet_id);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    function quoteTweet($origin, $message, $images = '') {

        $this->getDb();
        $data = $this->quoteTweetQuery($origin, $message, $images);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    function idUserFromOrigin(int $origin_id) {

        $this->getDb();
        $data = $this->idUserFromOriginQuery($origin_id, 'Tweet');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function newComment($message, $tweet_id, $images = '') {
        
        $this->getDb();
        $data = $this->newCommentQuery($message, $tweet_id, $images);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function getComments() {

        $this->getDb();
        $data = $this->getAllByIdQuery($_POST['seeComments'], 'Tweet', 'tweets', 'comments');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function aboveCommentsTweet() {

        $this->getDb();
        $data = $this->getAllByIdQuery($_POST['seeComments'], 'Tweet', 'tweets', 'id');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function getAllTweetsDataById($id, $obj) {

        $this->getDb();
        $data = $this->getAllByIdQuery($id, $obj, 'tweets', 'id');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function newLike($tweet_id) {

        $this->getDb();
        $data = $this->newLikeQuery($tweet_id);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function isLiked($tweet_id) {

        $this->getDb();
        $data = $this->isLikedQuery($tweet_id);
        
        if (!empty($data)) {

            return true;
        } else {
            return false;
        }

    }

    public function dislike($tweet_id) {

        $this->getDb();
        $data = $this->dislikeQuery($tweet_id);

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

    public function retweetsNumber($tweet_id) {

        $this->getDb();
        $data = $this->countElementsQuery("tweets", "origin", $tweet_id);

        if ($data) {

            return $data[0][0];
        } else {
            return 0;
        }
    }
}

?>