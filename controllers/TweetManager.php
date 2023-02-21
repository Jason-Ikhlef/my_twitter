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

            return true;
        } else {
            
            return false;
        }
    }
}

?>