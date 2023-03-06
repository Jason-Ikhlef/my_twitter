<?php 

$this->_t = 'Tweet'; // Normal que le $this soit souligné au jaune, NO PANIC.

$user = new UserManager;
$tweet = new TweetManager;

?>
<div class="tweet">
    <div class="tweet-header">
        <?= $user->nicknameFromId($tweet->aboveCommentsTweet()[0]->user_id())[0]->nickname() ?>
    </div>
    <div class="tweet-main">
        <?= $tweet->aboveCommentsTweet()[0]->message()?>
    </div>
    <?php if ($tweet->aboveCommentsTweet()[0]->origin()) :?>
        <div class="tweet-quote">
            <div class="nickname-quoteTweet">
                <?= $user->nicknameFromId($tweet->idUserFromOrigin($tweet->aboveCommentsTweet()[0]->origin())[0]->user_id())[0]->nickname() ?>
            </div>
            <div class="message-quoteTweet">
                <?= $tweet->getAllTweetsDataById($tweet->aboveCommentsTweet()[0]->origin(), 'Tweet')[0]->message() ?>
            </div>
        </div>
    <?php endif ?>
    <div class="tweet-footer">
        nbr rt, nbr like
    </div>
</div>
<br>

<?php if ($comments): ?>
    <?php foreach ($comments as $data): ?>
            <div class="tweet">
                <div class="tweet-header">
                    <?= $user->nicknameFromId($data->user_id())[0]->nickname() ?>
                </div>
                <div class="tweet-main">
                    <?= $data->message() ?>
                </div>
                <div style="margin-top: 10px;" class="tweet-footer">
                        <button class="retweetButton" style="cursor: pointer;" value="<?= $data->id() ?>" name="retweetButton" >Retweet</button>
                        <button class="commentButton" style="cursor: pointer;" value="<?= $data->id() ?>" name="commentButton" type="button">Commenter</button>
                        <button class="quoteTweetButton" style="cursor: pointer;" value="<?= $data->id() ?>" name="quoteTweetButton" type="button">Citer</button>
                    <form action="tweet" method="post" id="tweetMainForm">
                        <button class="seeComments" style="cursor: pointer;" value="<?= $data->id() ?>" name="seeComments" type="submit">Voir plus</button>
                    </form>
                </div>
            </div>
            <br>
    <?php endforeach ?>
    <?php endif ?>