<?php 

class TweetManager extends Model {

    // Tweet table Functions Here ...

    public function newTweet($message, $user_id = 1, $images = '') {

        if (empty($message)) {

            return 'Tweet vide';
        } else if (strlen($message) > 140) {
            
            return 'Message trop long';
        }

        $this->getDb();
        $data = $this->newTweetQuery($message, $user_id, $images);

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

    function quoteTweet($origin, $message, $user_id = 1, $images = '') {

        $this->getDb();
        $data = $this->quoteTweetQuery($origin, $message, $user_id, $images);

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
}

?>