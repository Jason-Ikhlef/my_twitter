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

    function retweet($origin, $message = '', $images = '') {

        $this->getDb();
        $data = $this->retweetQuery($origin, $message, $images);

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

    public function commentsNumber($tweet_id) {

        $this->getDb();
        $data = $this->countElementsQuery("tweets", "comments", $tweet_id);

        if ($data) {

            return $data[0][0];
        } else {
            return 0;
        }
    }

    public function likesNumber($tweet_id) {

        $this->getDb();
        $data = $this->countElementsQuery("likes", "tweet_id", $tweet_id);

        if ($data) {

            return $data[0][0];
        } else {
            return 0;
        }
    }

    public function spanMessage(string $msg) {

        $words = explode(" ", $msg);

        foreach ($words as $word) {

            if (str_starts_with($word, "@")) {
                $msg = str_replace($word, '<span class="toProfile w-fit text-blue-700 hover:underline underline-offset-1">' . $word . "</span>", $msg);
                
            } else if (str_starts_with($word, "#")) {
                $msg = str_replace($word, '<form style="width:fit-content; display:inline;" action="hashtag" method ="get"><button class="toHashtag text-blue-700 hover:underline underline-offset-1" name="value" type="submit" value=' . str_replace("#", '', $word) . ">" . $word . "</button></form>", $msg);
            }
        }

        return $msg;
    }

    public function htag(string $hashtag) {

        $this->getDb();
        $data = $this->htagQuery($hashtag, 'Tweet');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }
}

?>